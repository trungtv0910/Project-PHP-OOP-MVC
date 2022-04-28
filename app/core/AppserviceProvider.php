<?php

class AppserviceProvider extends ServiceProvider {
    public function boot(){
       $dataUser = $this->db->table('users')->where('id','=',3)->first();
       $data['userInfo']= $dataUser;
       $data['copyright']= 'Copyright &copy; 2022 by Vantrung';
       $data['list_category']= $this->db->table('categories')->where('parent_id','=',0)->get();
       View::share($data);


    }
}