<?php
    function userLogin(){
        $db=\Config\Database::connect();
        return $db->table('employee')->where('users_id',session('users_id'))->get()->getRow();
    }
?>