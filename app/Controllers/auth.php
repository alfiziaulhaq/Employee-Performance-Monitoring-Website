<?php

namespace App\Controllers;

class auth extends BaseController
{
    public function index()
    {

    }

    public function login()
    {
        if (session('users_id')) {
            if(session('roles')==3){
                return redirect()->to(site_url('admin'));
            }elseif(session('roles')==2){
                return redirect()->to(site_url('manager'));
            }elseif(session('roles')==1){
                return redirect()->to(site_url('staff'));
            }
        }

        echo view('auth/login');
    }
    public function login_process()
    {
        $data = $this->request->getPost();
        $query = $this->db->table('employee')->getWhere(['username' => $data['username']]);
        $user = $query->getRowArray();
        if ($user) {
            if (password_verify($data['password'], $user['password_user'])) {
                $params = ['users_id' => $user['users_id'], 'roles' => $user['roles']];

                session()->set($params);
                if(session('roles')==3){
                    return redirect()->to(site_url('admin/dash'));
                }elseif(session('roles')==2){
                    return redirect()->to(site_url('manager/dash'));
                }else{
                    return redirect()->to(site_url('staff/dash'));
                }
                
            } else {
                return redirect()->back()->with('error', 'wrong password');
            }
        } else {
            return redirect()->back()->with('error', 'wrong username');
        }
    }

    public function logout()
    {
        session()->remove('users_id');
        session()->remove('roles');

        return redirect()->to(site_url('login'));
    }
}