<?php

class AuthMiddleware extends Middlewares{
    public function handle()
    {
//        Load::model()
        // TODO: Implement handle() method.
        if(Session::data('admin_login')==null){
            $response = new Response();
          return  $response->redirect('admin/Admin_login/viewLogin');
        }

    }
}