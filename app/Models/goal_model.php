<?php

namespace App\Models;

use CodeIgniter\Model;

class goal_model extends Model
{
    protected $table = 'goals';
    protected $primaryKey = 'goal_id';
    protected $returnType = 'object';
    protected $allowedFields = ['description_goal', 'value_goal', 'actual_acc', 'note_goal', 'status_goal', 'users_id', 'periodic_id', 'rating_id'];
    protected $useTimestamps = true;

    public function getdatajoin($where)
    {
        $builder = $this->db->table('goals');
        $builder->join('periodic', 'periodic.periodic_id = goals.periodic_id', 'LEFT');
        $builder->join('employee', 'employee.users_id = goals.users_id', 'LEFT');
        $builder->where($where);
        $builder->orderBy('goals.goal_id', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }
    public function getdatajoinrow($where)
    {
        $builder = $this->db->table('goals');
        $builder->join('periodic', 'periodic.periodic_id = goals.periodic_id', 'LEFT');
        $builder->join('employee', 'employee.users_id = goals.users_id', 'LEFT');
        $builder->where($where);
        $builder->orderBy('goals.status_goal', 'ASC');
        $query = $builder->get();
        return $query->getRow();
    }


}