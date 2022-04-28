<?php

class Users extends Controller
{
    protected $data, $province;
    protected $title = 'Khách hàng';

    public function __construct()
    {
        $this->data['sub_content']['title'] = 'Quản Lý Khách Hàng';
        $this->province = $this->model('UserModel');
    }

    public function index()
    {

        $this->data['page_title'] = $this->title;
        $this->data['sub_content']['btn_add'] = 'Thêm ' . $this->title;
        $this->data['sub_content']['title_child'] = " Danh sách khách hàng";


//        danh sách khách hàng
        $this->data['sub_content']['user_list'] = $this->province->all();

//        danh sách quyền
        $this->data['sub_content']['role_list'] = $this->db->table('roles')->get();
       $this->data['sub_content']['role_user'] = $this->db->table('role_user')->get();

        $this->data['content'] = 'admin/users/index';
        return $this->render('layouts/admin_layout', $this->data);
    }


    public function viewUser($id)
    {
        $this->data['sub_content']['msgSuccess'] = Session::flash('msgSuccess');
        $this->data['page_title'] = $this->title;
        $this->data['sub_content']['user'] = $this->province->find($id);

        $this->data['sub_content']['role_list'] = $this->db->table('roles')->get();
        $this->data['sub_content']['roleOfUser'] = $this->db->table('role_user')->where('user_id','=',$id)->get();
//      $d= $this->data['sub_content']['roleOfUser'] = $this->db->query("SELECT * FROM role_user WHERE user_id = $id");


        $this->data['sub_content']['title_child'] = "Thông Tin khách hàng";
        $this->data['content'] = 'admin/users/view';
        return $this->render('layouts/admin_layout', $this->data);
    }

    public function update($id)
    {
        $request = new Request();
        $response = new Response();
        $data = $request->getFields();
        if (!empty($id)) {
//update thông tin cho user
            $dataUser = $this->province->find($id);
            $dataUserNew = [
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'address' => $data['address']
            ];
//update data cho user
            $this->db->updateData('users', $dataUserNew, 'id=' . $id);

//update Role cho user
            $dataRoles = $this->db->table('role_user')->where('user_id', '=', $id)->delete();
            if ($dataRoles) {
                if (!empty($data['roles'])) {
                    foreach ($data['roles'] as $roleItem) {
                        $dataRolesNew = [
                            'user_id' => $id,
                            'role_id' => $roleItem
                        ];
                        $this->db->table('role_user')->insert($dataRolesNew);
                    }
                }
            }
            Session::flash('msgSuccess', 'Cập nhập thành công');
            return $response->redirect('admin/users/viewUser/'.$id);
        }
        Session::flash('msgSuccess', 'Cập nhập thất bại');
        return $response->redirect('admin/users/index');

    }


}