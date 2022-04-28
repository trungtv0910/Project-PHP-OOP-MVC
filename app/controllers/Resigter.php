<?php

class Resigter extends Controller
{
    protected $data, $province;
    public function __construct()
    {
        $this->province = $this->model('UserModel');
    }
    public function index(){
        $this->data['sub_content']['msg'] = Session::flash('msg');
        $this->data['sub_content']['msgError'] = Session::flash('msgError');
        $this->data['sub_content']['title']="Đăng ký";
        $this->data['page_title']="Đăng Ký";
        $this->data['content']= 'resigter/resigter';
        return $this->render('layouts/client_layout',$this->data);
    }

    public function store(){
        $request = new Request();
        $response= new Response();

        $dataGet = $request->getFields();

        $request->rules([
            'name'=> 'required|min:5|unique:users:name',
            'password'=>'required|min:5',
            'phone'=>'required|min:8',
            'email'=>'required|min:5',
            'address'=>'required|min:10'
        ]);
        $request->message([
            'name.required'=>'Tên đăng nhập không được để trống',
            'name.unique'=>'Tên đăng nhập đã tồn tại! Vui lòng nhập tên khác',
            'name.min'=>'Tên đăng nhập quá ngắn',
            'phone.min'=>'số điện thoại không hợp lý',
            'phone.required'=>'Số điện thoại không được để trống',
            'email.min'=>'Email quá ngắn',
            'email.required'=>'Email không được để trống',
            'password.required'=>'Mật khẩu không được để trống',
            'password.min'=>'Mật khẩu quá ngắn',
            'address.required'=>'Địa chỉ không được để trống',
            'address.min'=>'Địa chỉ không hợp lệ'
        ]);

        $validate = $request->validate();
        if(!$validate){
            Session::flash('msg','Đăng Nhập Không Thành Công');
            return $response->redirect('Resigter/index');
        }
        $data = [
            'name' => $dataGet['name'],
            'password' => $dataGet['password'],
            'confirm_password' => $dataGet['password'],
            'role' => 0,
            'email'=>$dataGet['email'],
            'phone' => $dataGet['phone'],
            'address' => $dataGet['address']

        ];
        $this->db->table('users')->insert($data);
        Session::data('client_login', $data);
        return $response->redirect('home/index');

    }

}