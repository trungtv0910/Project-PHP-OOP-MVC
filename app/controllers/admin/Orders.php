<?php

class Orders extends Controller
{  protected $title = 'Đơn Hàng';
    protected $province, $data;

    public function __construct()
    {
        $this->data['sub_content']['title'] = 'Quản Lý Đơn Hàng';
        $this->province = $this->model('OrderModel');
    }
    public function index(){
        $this->data['page_title'] = $this->title;
        $this->data['content'] = 'admin/orders/index';
        $this->data['sub_content']['title_child'] = "Danh sách đơn hàng";
        $this->data['sub_content']['list_bill'] = $this->db->table('bill')->orderBy('id', 'DESC')->get();


//        $this->data['sub_content']['list_parent_cate'] =$this->province->all();
        return $this->render('layouts/admin_layout', $this->data);
    }
    public function viewCartById($id){
        $this->data['sub_content']['msgSuccess'] = Session::flash('msgSuccess');
        $this->data['page_title'] = $this->title;
        $this->data['content'] = 'admin/orders/detailBill';
        $this->data['sub_content']['title_child'] = "Chi Tiết Đơn Hàng";
       $dataBill= $this->db->table('bill')->where('id','=',$id)->first();
        $this->data['sub_content']['billId'] = $id;
        $this->data['sub_content']['list_prod'] =json_decode($dataBill['content'],true);

        return $this->render('layouts/admin_layout', $this->data);

    }
    public function updateBill($id){
        $response = new Response();
        $request = new Request();

        $getData = $request->getFields();
        $this->db->table('bill')->where("id",'=',$id)->update(['status'=>$getData['status']]);
        Session::flash('msgSuccess', 'Cập Nhập Trạng Thái Đơn Thành Công');
        return $response->redirect('admin/orders/viewCartById/'.$id);
    }
}