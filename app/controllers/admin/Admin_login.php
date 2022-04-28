<?php

class Admin_login extends Controller
{
    protected $province;
    protected $data;
    public function __construct()
    {
        $this->province = $this->model('UserModel');
    }

    public function viewLogin()
    {
        $this->data['msg']=Session::flash('msg');
        return $this->render('admin/account/login',$this->data);
    }

    /*
     * Post login
     */
    public function login()
    {
        $request = new Request();
        $response = new Response();
//        From Client
        $getUser = $request->getFields();
        $username = $getUser['username'];
        $password = $getUser['password'];
//        From system Database
        $dataUser = $this->province->getAdminUser();

        foreach ($dataUser as $key => $userItem) {
            echo '<pre>';
            print_r($userItem);
            echo '</pre>';
            if ($userItem['name'] == $username && $userItem['password'] == $password) {
                if ($userItem['role'] == 0) {
                    return $response->redirect('admin/Admin_login/viewLogin');
                }
                $data = [
                    'name' => $username,
                    'password' => $password,
                    'role' => $userItem['role'],
                    'user_id'=>$userItem['id']
                ];
                Session::data('admin_login', $data);
                return $response->redirect('admin/dashboard');
            } else {
//                làm hiển thị thông báo khi sai password
                Session::flash('msg','Đăng nhập thất Bại! Sai Username hoặc Password');
                return $response->redirect('admin/Admin_login/viewLogin');
            }
        }
    }

    public function logout()
    {
        Session::delete();

        return $this->viewLogin();
    }
}