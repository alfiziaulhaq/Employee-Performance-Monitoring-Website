<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;
use App\Models\goal_model;
use App\Models\ratings_model;

class Manager extends ResourcePresenter
{
    function __construct()
    {
        $this->goals = new goal_model();
        $this->ratings = new ratings_model();
        $this->db = \Config\Database::connect();
    }
    protected $helpers = ['session'];
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $staff = $this->db->table('employee')->where(['evaluator_id' => userLogin()->users_id]);
        $data['staff'] = $staff->countAllResults();

        $data['active'] = $this->goals->getdatajoin(['goals.status_goal ' => 1, 'employee.evaluator_id' => userLogin()->users_id]);
        $data['fixed'] = $this->goals->getdatajoin(['goals.status_goal ' => 2, 'employee.evaluator_id' => userLogin()->users_id]);
        $data['total'] = $this->goals->getdatajoin(['goals.status_goal <=' => 2, 'employee.evaluator_id' => userLogin()->users_id]);
        return view('manager/manager_dash', $data);
    }

    /**
     * Present a view to present a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */

    public function show($id = null)
    {     
        
        $data['name'] = $this->db->table('employee')->getWhere(['users_id' => $id])->getRow();

        $data['staff'] = $this->goals->Where(['users_id' => $id])->first();
        $data['goal'] = $this->goals->getdatajoin(['goals.users_id' => $id, 'status_goal !=' => 3,]);
        $check=count($data['goal']);
        if($check!=null){
            return view('manager/staff_goal', $data);
        }else{
            return redirect()->back()->with('error', 'the current staff  goals are empty ');
        }

        

    }

    /**
     * Present a view to present a new single resource object
     *
     * @return mixed
     */
    public function new()
    {
        $manager = $this->db->query("SELECT *  FROM  periodic where status_time=1");
        $data['periodic'] = $manager->getResultArray();

        $manager_id = userLogin()->users_id;
        $user = $this->db->query("SELECT *  FROM  employee where evaluator_id= $manager_id");
        $data['staff'] = $user->getResultArray();

        return view('manager/add_goal', $data);

    }

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return mixed
     */
    public function create()
    {
        $data = [
            'description_goal' => $this->request->getVar('description'),
            'value_goal' => $this->request->getVar('value'),
            'actual_acc' => $this->request->getVar('actual'),
            'note_goal' => $this->request->getVar('note'),
            'users_id' => $this->request->getVar('staff'),
            'periodic_id' => $this->request->getVar('periodic'),
            'status_goal' => 1,
            'rating_id' => null
        ];
        $this->goals->insert($data);
        /*
        $data = $this->request->getPost();
        $this->db->table('periodic')->insert($data);
        */

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('manager/goal_db'))->with('success', 'data saved success');
        }
    }

    /**
     * Present a view to edit the properties of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        if ($id != null) {
            $query = $this->goals->getdatajoinrow(['goal_id' => $id]);

            if ($query != null) {
                $status = $query->status_goal;
                if ($status != 3) {
                    $data['goal'] = $query;
                    return view('manager/edit_goal', $data);
                } else {
                    return redirect()->back()->with('error', 'goal has been archived');
                }

            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }

        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    /**
     * Process the updating, full or partial, of a specific resource object.
     * This should be a POST.
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $goal = $this->goals->getdatajoinrow(['goal_id' => $id]);
        $user = $goal->users_id;
        $archive = $this->request->getVar('status_goal');
        $agree = $this->request->getVar('agree');
        if ($archive == 1 & $agree == 1) {
            $data = [
                'description_goal' => $this->request->getVar('description'),
                'value_goal' => $this->request->getVar('value'),
                'actual_acc' => $this->request->getVar('actual'),
                'note_goal' => $this->request->getVar('note'),
                'status_goal' => 2,
            ];
            $this->goals->update($id, $data);

            return redirect()->to(site_url('manager/show/' . $user))->with('success', 'goal archived successfully');
        } else {
            $data = [
                'description_goal' => $this->request->getVar('description'),
                'value_goal' => $this->request->getVar('value'),
                'actual_acc' => $this->request->getVar('actual'),
                'note_goal' => $this->request->getVar('note'),
                'status_goal' => 1,
            ];
            $this->goals->update($id, $data);

            return redirect()->to(site_url('manager/show/' . $user))->with('success', 'data updated successfully');
        }
    }

    /**
     * Present a view to confirm the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function remove($id = null)
    {
        //
    }

    /**
     * Process the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $query = $this->goals->getWhere(['goal_id' => $id]);
        $status = $query->getRow()->status_goal;
        if ($status != 3) {
            $this->goals->delete($id);
            return redirect()->to(site_url('manager/goal_db'))->with('success', 'goal deleted successfully');
        } else {
            return redirect()->back()->with('error', 'goal has been archived');
        }
    }

    public function goal_db()
    {

        $data['goal'] = $this->goals->getdatajoin(['evaluator_id' => userLogin()->users_id]);
        return view('manager/goal_db', $data);

    }
    public function staff_db()
    {

        $data['employee'] = $this->db->table('employee')->getWhere(['evaluator_id' => userLogin()->users_id])->getResult();

        return view('manager/staff_db', $data);
    }

    public function periodic_db()
    {

        $data['periodic'] = $this->db->table('periodic')->Where(['status_time' => 2])->orderBy('periodic_id','DESC')->get()->getResult();

        return view('manager/periodic_db', $data);

    }
    public function approve($id)
    {
        $data['fixed'] = $this->goals->getdatajoin(['goals.users_id' => $id, 'status_goal' => 2,'status_time'=>2]);
        $data['pending'] = $this->goals->getdatajoin(['goals.users_id' => $id, 'status_goal <=' => 2]);

        $fixed = $data['fixed'];
        $index = count($fixed);
        $pendings = $data['pending'];
        if ($index == count($pendings)) {
            $final_score = 0;
            $grade = null;
            $percents = 0;
            for ($i = 0; $i < $index; $i++) {
                $percent = $fixed[$i]->actual_acc;
                $value = $fixed[$i]->value_goal;
                $score = $percent / 100 * $value;
                $final_score += $score;
                $percents += $percent;
            }
            $final_percents = $percents / $index;
            if ($final_percents >= 90) {
                $grade = 'A';
            } elseif ($final_percents >= 80 and $final_percents < 90) {
                $grade = 'B';

            } elseif ($final_percents >= 70 and $final_percents < 80) {
                $grade = 'C';

            } elseif ($final_percents < 70) {
                $grade = 'D';

            }

            $ratings = [
                'percentage_acc' => $final_percents,
                'score_rating' => $final_score,
                'grade_rating' => $grade,
                'users_id' => $id,
                'periodic_id' => $fixed[0]->periodic_id,

            ];
            $this->ratings->insert($ratings);

            $rating_fisrt = $this->ratings->getdatajoinrow(['ratings.users_id' => $id]);
            $rating_id = $rating_fisrt->rating_id

            ;
            for ($i = 0; $i < $index; $i++) {

                //update status goal to archived and rating id 
                $ids = $fixed[$i]->goal_id;
                $goals = [
                    'status_goal' => 3,
                    'rating_id' => $rating_id,
                ];
                $this->goals->update($ids, $goals);

            }

            return redirect()->to(site_url('manager/staff_db'))->with('success', 'Approval rating goals are success');

        } else {
            return redirect()->back()->with('error', 'All goals score are not fixed or status periodic are not archived');
        }
        /*$value=$index[0]->users_id;
        print_r($index);
        echo count($index);
        
        */
    }

    public function ratings_db()
    {
        $data['employee'] = $this->db->table('employee')->getWhere(['evaluator_id' => userLogin()->users_id])->getResult();
        $data['ratings'] = $this->ratings->getdatajoin(['evaluator_id' => userLogin()->users_id]);
        return view('manager/ratings_db', $data);
    }

    public function ratings_detail($id)
    {

        $data['goal'] = $this->goals->getdatajoin(['goals.rating_id' => $id, 'status_goal' => 3,]);
        return view('manager/ratings_detail', $data);
    }

    public function ratings_filter()
    {
        $staff = $this->request->getVar('staff');
        if ($staff == 0) {
            return redirect()->back()->with('error', 'please select your staff');
        }else {
            $data['ratings'] = $this->ratings->getdatajoin(['ratings.users_id' => $staff]);
            if($data['ratings']!=null){
            return view('manager/ratings_filter', $data);
            }
            else{
                return redirect()->back()->with('error', 'Ratings list is empty ');
            }
        }
    }

    public function ratings_periodic($id=null)
    {
        $data['ratings'] = $this->ratings->getdatajoin(['ratings.periodic_id' => $id,'employee.evaluator_id'=>userLogin()->users_id]);
        if($data['ratings']!=null){
        return view('manager/ratings_periodic', $data);
        }
        else{
            return redirect()->back()->with('error', 'Ratings list is empty ');
        }
    }
}