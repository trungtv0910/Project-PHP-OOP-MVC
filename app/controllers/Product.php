<?php
class Product extends Controller {
    public $data=[];
//    để có thể tuỳ biến được tên biến dữ liệu khi truyền sang view thì ta phải đặt biển $data= []
    protected $product_model;
    public function __construct()
    {
        $this->product_model= $this->model('ProductModel');

    }

    public function index(){
        echo 'Đây là product';
    }
    public function product_detail($id){
        $this->data['content']='products/product_detail';
        $this->data['sub_content']['title']= 'Danh sách sản phẩm Hot';
        $this->data['sub_content']['product_detail']= $this->product_model->find($id);
        $this->data['sub_content']['categories'] =$this->db->table('categories')->get();
        $this->data['page_title']="Chi Tiết Sản Phẩm";
        return $this->render('layouts/client_layout',$this->data);
    }

    public function list_product(){
        $title ="Danh Sách Sản Phẩm";
        $data = $this->product_model->getProductList();
        echo '<pre>';
        print_r($data);
        echo '</pre>';

//        include_once _DIR_ROOT.'/app/views/products/list.php';
        //render ra views
        $this->data['sub_content']['title']= 'Danh sách sản phẩm Hot';
        $this->data['content'] = 'products/list';
        $this->data['page_title']= $title;
//        $this->data['sub_content']['userInfo']=['name'=>'Văn trung'];
        return  $this->render('layouts/client_layout',$this->data);
    }
    public function list_productByCate($cateId=0){
        $title ="Danh Sách Sản Phẩm";

        $product_list=[];
        $cateTitle=$this->db->table('categories')->where('id','=',$cateId)->first()['name'];

        $list_cateChild = $this->db->table('categories')->where('parent_id','=',$cateId)->get();
        foreach ($list_cateChild as $key => $value){
            $prodGet = $this->db->table('products')->where('category_id','=',$value['id'])->get();
            foreach ($prodGet as $prodItem){
                array_push($product_list,$prodItem);
            }
        }


        $this->data['sub_content']['list_product_byCate'] =$product_list;
        $this->data['sub_content']['title'] = $cateTitle;
        $this->data['page_title']= $title;
        $this->data['content'] = 'products/list';
        return  $this->render('layouts/client_layout',$this->data);
    }


    public function detail_product($id=0){
        $title ="Chi Tiết Sản Phẩm";
     $this->data['sub_content']['oneProduct'] = $this->product_model->getProductDetail($id);
        $this->data['sub_content']['title'] = 'Chi tiết sản phẩm';
        $this->data['page_title']= $title;
        $this->data['content'] = 'products/detail';
//        $this->data['sub_content']['userInfo']=['name'=>'Văn trung'];
        return  $this->render('layouts/client_layout',$this->data);
    }


}