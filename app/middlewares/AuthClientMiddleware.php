<?php

class AuthClientMiddleware extends Middlewares{
    public function handle()
    {
        if(Session::data('client_login')==null){
            $response = new Response();
            echo ['code'=>500];
            return  $response->redirect('Login/viewLogin');
        }

    }


}