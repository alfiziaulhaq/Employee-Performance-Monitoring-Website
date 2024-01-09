<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function generate()
    {
        $password = 'users';
        echo password_hash($password, PASSWORD_BCRYPT);
        session()->remove('users_id');
        session()->remove('roles');
    }

    public function forbidden()
    {
        echo "you don't have access !!!";
    }
}