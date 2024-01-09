<?php

namespace App\Models;

use CodeIgniter\Model;

class ratings_model extends Model
{
    protected $table = 'ratings';
    protected $primaryKey = 'rating_id';
    protected $returnType = 'object';
    protected $allowedFields = ['percentage_acc', 'score_rating', 'grade_rating', 'users_id', 'periodic_id'];
    protected $useTimestamps = true;

    public function getdatajoin($where)
    {
        $builder = $this->db->table('ratings');
        $builder->join('periodic', 'periodic.periodic_id = ratings.periodic_id', 'LEFT');
        $builder->join('employee', 'employee.users_id = ratings.users_id', 'LEFT');
        $builder->where($where);
        $builder->orderBy('ratings.rating_id', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }
    public function getdatajoinrow($where)
    {
        $builder = $this->db->table('ratings');
        $builder->join('periodic', 'periodic.periodic_id = ratings.periodic_id', 'LEFT');
        $builder->join('employee', 'employee.users_id = ratings.users_id', 'LEFT');
        $builder->where($where);
        $builder->orderBy('ratings.rating_id', 'DESC');
        $query = $builder->get();
        return $query->getRow();
    }


}