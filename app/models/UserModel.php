<?php

class UserModel extends Model
{
    protected $__table = 'users';
    function tableFill(){
        return $this->__table;
    }
    function fieldFill(){
//        return 'name, price';
        return '*';
    }
    function primaryKey()
    {
        return 'id';}
    public function getAdminUser(){
        $AdminUser = $this->db->table('users')->where('role','=',1)->get();
        return $AdminUser;
    }
}