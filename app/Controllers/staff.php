<?php

namespace App\Controllers;
use App\Models\goal_model;
use App\Models\ratings_model;
class staff extends BaseController{
    function __construct()
    {
        $this->goals = new goal_model();
        $this->ratings = new ratings_model();
        $this->db = \Config\Database::connect();
    }
    public function index(){
        $data['manager']=$this->db->table('employee')->getWhere(['users_id'=>userLogin()->evaluator_id])->getRow();
        return view('staff/staff_dash',$data);
    }
    public function my_goals(){
        $data['goal'] = $this->goals->getdatajoin(['goals.users_id' => userLogin()->users_id, 'status_goal !=' => 3,]);
        return view('staff/my_goal',$data);
    }

    public function my_kpi(){
        $data['ratings'] = $this->ratings->getdatajoin(['ratings.users_id' =>userLogin()->users_id]);
        return view('staff/my_kpi',$data);
    }
    public function kpi_detail($id){
        $data['goal'] = $this->goals->getdatajoin(['goals.rating_id' => $id, 'status_goal' => 3,]);
       
        return view('staff/kpi_detail',$data);
    }
}