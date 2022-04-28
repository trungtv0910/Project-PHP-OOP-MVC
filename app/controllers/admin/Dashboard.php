<?php
class Dashboard extends Controller {
    public function index(){
//        $this->data['sub_content']['title']= 'Danh sách sản phẩm Hot';
//        $this->data['content'] = 'admin/categories/index';
//       return $this->render('layouts/admin_layout',$this->data); // để tạm sang category ,sửa sau
        $response = new Response();
        return $response->redirect('admin/categories/index');
    }
}