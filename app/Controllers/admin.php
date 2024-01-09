<?php

namespace App\Controllers;

class admin extends BaseController
{
    public function index()
    {
        $employee = $this->db->table('employee');
        $data['employee'] = $employee->countAllResults();
        $admin = $this->db->table('employee')->where(['roles' => 3]);
        $data['admin'] = $admin->countAllResults();
        $manager = $this->db->table('employee')->where(['roles' => 2]);
        $data['manager'] = $manager->countAllResults();
        $staff = $this->db->table('employee')->where(['roles' => 1]);
        $data['staff'] = $staff->countAllResults();
        return view('admin/admin_dash', $data);
    }
    public function employee_db()
    {
        /* query builder way
        $builder = $this->db->table('employee');
        $query = $builder->get()->getResult();
        $data['employee']=$query;
        */
        //query sql way
        $query = $this->db->query("SELECT * FROM  employee");
        $data['employee'] = $query->getResult();

        return view('admin/admin_employee', $data);
    }

    public function add_employee()
    {
        $manager = $this->db->query("SELECT *  FROM  employee where roles=2 ");
        $data['manager'] = $manager->getResultArray();

        return view('admin/add_employee', $data);
    }

    public function save_employee()
    {
        $name = $this->request->getPost('name_user');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password_user');
        $evaluator = $this->request->getPost('evaluator_id');
        $roles = $this->request->getPost('roles');
        if ($evaluator == 0) {
            $evaluator = null;
        }
        $check_username = $this->db->table('employee')->getWhere(['username' => $username])->getRow();
        if ($check_username == null) {
            if ($roles == 1) {
                $data = [
                    'username' => $this->request->getVar('username'),
                    'password_user' => password_hash($password, PASSWORD_BCRYPT),
                    'name_user' => $this->request->getVar('name_user'),
                    'job_title' => $this->request->getVar('job_title'),
                    'address' => $this->request->getVar('address'),
                    'gender' => $this->request->getVar('gender'),
                    'no_telp' => $this->request->getVar('no_telp'),
                    'roles' => $this->request->getVar('roles'),
                    'evaluator_id' => $evaluator,


                ];
                $this->db->table('employee')->insert($data);
                if ($this->db->affectedRows() > 0) {
                    return redirect()->to(site_url('admin/employee_db'))->with('success', 'data saved success');
                }
            } else {
                $data = [
                    'username' => $this->request->getVar('username'),
                    'password_user' => password_hash($password, PASSWORD_BCRYPT),
                    'name_user' => strtoupper($name),
                    'job_title' => $this->request->getVar('job_title'),
                    'address' => $this->request->getVar('address'),
                    'gender' => $this->request->getVar('gender'),
                    'no_telp' => $this->request->getVar('no_telp'),
                    'roles' => $this->request->getVar('roles'),
                    'evaluator_id' => null,


                ];
                $this->db->table('employee')->insert($data);
                if ($this->db->affectedRows() > 0) {
                    return redirect()->to(site_url('admin/employee_db'))->with('success', 'data saved success');
                }
            }

        } else {
            return redirect()->to(site_url('admin/employee_db'))->with('error', 'username already exists');
        }

        /*
        $data = $this->request->getPost();
        $this->db->table('employee')->insert($data);
        */

    }

    public function edit_employee($id = null)
    {
        if ($id != null) {
            $query = $this->db->table('employee')->getWhere(['users_id' => $id]);
            if ($query->resultID->num_rows > 0) {
                $manager = $this->db->query("SELECT *  FROM  employee where roles=2 ");
                $data['manager'] = $manager->getResultArray();

                $data['user'] = $query->getRow();
                return view('admin/edit_employee', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }

        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update_employee($id)
    {
        $name = $this->request->getPost('name_user');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password_user');
        $change_pass = $this->request->getPost('change_password');
        $change_user = $this->request->getPost('change_username');
        $evaluator = $this->request->getPost('evaluator_id');
        $roless = $this->db->table('employee')->getWhere(['users_id' => $id])->getRow();
        $roles = $roless->roles;
        if ($evaluator == 0) {
            $evaluator = null;
        }
        if ($change_user == 1) {
            $check_username = $this->db->table('employee')->getWhere(['username' => $username])->getRow();
            if ($check_username == null) {
                $data = ['username' => $this->request->getVar('username'),];
                $this->db->table('employee')->where(['users_id' => $id])->update($data);
            } else {
                return redirect()->to(site_url('admin/employee_db'))->with('error', 'username already exists');
            }
        }

        if ($change_pass == 1) {
            $data = ['password_user' => password_hash($password, PASSWORD_BCRYPT),];
            $this->db->table('employee')->where(['users_id' => $id])->update($data);
        }
        if ($roles == 1) {
            if ($evaluator != null) {
                $data = [
                    'evaluator_id' => $evaluator,
                ];
                $this->db->table('employee')->where(['users_id' => $id])->update($data);
            } else {
                return redirect()->to(site_url('admin/employee_db'))->with('error', 'evaluator id must be assigned for staff');
            }

        }
        $data = [

            'name_user' => strtoupper($name),
            'job_title' => $this->request->getVar('job_title'),
            'address' => $this->request->getVar('address'),
            'gender' => $this->request->getVar('gender'),
            'no_telp' => $this->request->getVar('no_telp'),

        ];
        $this->db->table('employee')->where(['users_id' => $id])->update($data);
        return redirect()->to(site_url('admin/employee_db'))->with('success', 'data updated successfully');




        /* $data = $this->request->getPost();
        unset($data['_method']);
        $this->db->table('employee')->where(['users_id'=>$id])->update($data);      
        */

    }

    public function delete_employee($id)
    {
        $check = $this->db->table('employee')->getWhere(['evaluator_id' => $id])->getRow();
        if ($check == null) {
            $this->db->table('employee')->where(['users_id' => $id])->delete();

            return redirect()->to(site_url('admin/employee_db'))->with('success', 'data deleted successfully');
        } else {
            return redirect()->back()->with('error', 'deleting manager constraint is restricted.');
        }


    }


    ///  periodic controller
    public function periodic_db()
    {
        $builder = $this->db->table('periodic')->orderBy('periodic_id', 'DESC');
        $query = $builder->get()->getResult();
        $current = $this->db->table('periodic')->where(['status_time' => 1])->get()->getRow();
        $data['periodic'] = $query;
        $data['current'] = $current;

        return view('admin/admin_periodic', $data);
    }
    public function add_periodic()
    {
        $current = $this->db->table('periodic')->where(['status_time' => 1])->get()->getRow();

        if ($current == null) {
            return view('admin/add_periodic');
        } else {
            return redirect()->back()->with('error', 'THERE ARE CURRENT PERIOD ACTIVE');
        }

    }

    public function save_periodic()
    {
        $data = [
            'start_time' => $this->request->getVar('start_time'),
            'end_time' => $this->request->getVar('end_time'),
            'status_time' => 1,
        ];
        $this->db->table('periodic')->insert($data);
        /*
        $data = $this->request->getPost();
        $this->db->table('periodic')->insert($data);
        */

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('admin/periodic_db'))->with('success', 'data saved success');
        }
    }

    public function edit_periodic($id = null)
    {
        if ($id != null) {
            $query = $this->db->table('periodic')->getWhere(['periodic_id' => $id]);
            if ($query->resultID->num_rows > 0) {
                $status = $query->getRow()->status_time;
                if ($status == 1) {
                    $data['periodic'] = $query->getRow();
                    return view('admin/edit_periodic', $data);
                } else {
                    return redirect()->back()->with('error', 'periodic has been archived');
                }

            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }

        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update_periodic($id)
    {
        $archive = $this->request->getVar('status_time');
        $agree = $this->request->getVar('agree');
        if ($archive == 1 & $agree == 1) {
            $data = [
                'start_time' => $this->request->getVar('start_time'),
                'end_time' => $this->request->getVar('end_time'),
                'status_time' => 2,
            ];
            $this->db->table('periodic')->where(['periodic_id' => $id])->update($data);


            /* $data = $this->request->getPost();
            unset($data['_method']);
            $this->db->table('periodic')->where(['users_id'=>$id])->update($data);      
            */
            return redirect()->to(site_url('admin/periodic_db'))->with('success', 'data archived successfully');
        } else {
            $data = [
                'start_time' => $this->request->getVar('start_time'),
                'end_time' => $this->request->getVar('end_time'),
                'status_time' => 1,
            ];
            $this->db->table('periodic')->where(['periodic_id' => $id])->update($data);


            /* $data = $this->request->getPost();
            unset($data['_method']);
            $this->db->table('periodic')->where(['users_id'=>$id])->update($data);      
            */
            return redirect()->to(site_url('admin/periodic_db'))->with('success', 'data updated successfully');
        }

    }

    public function delete_periodic($id)
    {
        $query = $this->db->table('periodic')->getWhere(['periodic_id' => $id]);
        $status = $query->getRow()->status_time;
        if ($status == 1) {
            $this->db->table('periodic')->where(['periodic_id' => $id])->delete();
            return redirect()->to(site_url('admin/periodic_db'))->with('success', 'data deleted successfully');
        } else {
            return redirect()->back()->with('error', 'periodic has been archived');
        }
    }
}