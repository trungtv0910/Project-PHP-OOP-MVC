<?php

class Login extends Controller
{
    protected $data, $province;
    public function __construct()
    {
        $this->province = $this->model('UserModel');
    }

    public function index(){
        echo 'Đang ở Trang Login';
    }
    public function viewLogin(){
        $this->data['sub_content']['msg'] = Session::flash('msg');
        $this->data['sub_content']['msgError'] = Session::flash('msgError');
        $this->data['sub_content']['title']="Đăng nhập";
        $this->data['page_title']="Đăng nhập";
        $this->data['content']= 'login/login';
        return $this->render('layouts/client_layout',$this->data);
    }

    public function login(){
        $request = new Request();
        $response= new Response();
        $dataUser = $this->province->all();
        $dataRole = $this->db->table('role_user');
        $dataGet = $request->getFields();

        $request->rules([
            'name'=> 'required|min:5',
            'password'=>'required|min:5'
        ]);
        $request->message([
            'name.required'=>'Tên đăng nhập không được để trống',
            'name.min'=>'Tên đăng nhập quá ngắn',

            'password.required'=>'Mật khẩu không được để trống',
            'password.min'=>'Mật khẩu quá ngắn'
        ]);

        $validate = $request->validate();
        if(!$validate){
            Session::flash('msg','Đăng Nhập Không Thành Công');
            return $response->redirect('Login/viewLogin');
        }

        $checkDatabase = $this->db->table('users')->where('name','=',$dataGet['name'])->where('password','=',$dataGet['password'])->first();
       if($checkDatabase){
           $data = [
               'name' => $dataGet['name'],
               'password' => $dataGet['password'],
               'role' => $checkDatabase['role'],
               'user_id'=>$checkDatabase['id']
           ];
           Session::data('client_login', $data);
           return $response->redirect('home/index');
       }
        Session::flash('msgError','Mật Khẩu hoặc tài khoản không đúng');
       Session::flash('msg','Đăng Nhập Không Thành Công');
       return $response->redirect('Login/viewLogin');
    }

    public function logout(){
        Session::delete('client_login');
        Session::delete();
        return $this->viewLogin();
    }




}