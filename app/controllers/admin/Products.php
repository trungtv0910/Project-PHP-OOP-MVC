<?php
include_once 'app\trait\TraitUpload.php';
//use App\Traits\TraitUpload;
class Products extends Controller
{
    use TraitUpload;
    protected $data,$province;
    protected $title= 'Sản Phẩm';
    public function __construct()
    {
        $this->data['sub_content']['title'] = 'Quản Lý Sản Phẩm';
        $this->province = $this->model('ProductModel');
    }

    public function index(){
        $response = new Response();
        $this->data['page_title'] = $this->title;
        $this->data['sub_content']['btn_add']= 'Thêm '.$this->title;
        $this->data['sub_content']['title_child'] = "Danh sách sản phẩm";
//        dữ liệu
        $this->data['sub_content']['categories'] = $this->db->table('categories')->get();
//        danh sách sản phẩm
        $this->data['sub_content']['product_list'] = $this->db->table('products')->get();
        $this->data['content']='admin/products/index';
        $this->render('layouts/admin_layout',$this->data);
    }
    public function create(){
        $this->data['sub_content']['msg'] = Session::flash('msg');

         $this->data['sub_content']['msgSuccess'] = Session::flash('msgSuccess');
        $this->data['page_title'] = 'Thêm '.$this->title;
        $this->data['sub_content']['title_child'] = "Thêm sản phẩm";

        $this->data['sub_content']['categories'] = $this->db->table('categories')->get();
        $this->data['content']='admin/products/add';
        $this->render('layouts/admin_layout',$this->data);
    }

    public function store(){
        $request = new Request();
        $response = new response();
        $data = $request->getFields();

        $request->rules([
            'name'=>'required|min:5|unique:products:name',
            'price'=>'required',

            'category_id'=>'required',
            'content'=>'required|min:10'
        ]);
        $request->message([
            'name.required'=>'Tên sản phẩm không được để trống',
            'name.min'=>'Tên sản phẩm không đước ít hơn 5 ký tự',
            'name.unique'=>'Tên sản phẩm đã tồn tại',
            'price.required'=>'Giá sản phẩm không được để trống',

            'category_id.required'=>'Vui lòng chọn danh mục',
            'content.required'=>'Nội dung sản phẩm đang trống'
        ]);
        $validate = $request->validate();
        if(!$validate){
            Session::flash('msg','Thêm sản phẩm không thành công');
            return $response->redirect('admin/products/create');
        }else{

            $user_id =Session::data('admin_login')['user_id'];
            $dataNew= [
                'name'=>$data['name'],
                'category_id'=>$data['category_id'],
                'price'=>$data['price'],
                'content'=>trim($data['content']),
                'user_id'=>$user_id
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($data,'img','images');
            if(!empty($dataUploadFeatureImage)){
                    $dataNew['feature_image_path']=$dataUploadFeatureImage['file_path'];
                    $dataNew['feature_image_name']=$dataUploadFeatureImage['file_name'];
            }

            $this->db->table('products')->insert($dataNew);
            Session::flash('msgSuccess', 'Thêm Sản Phẩm Thành Công');
            return $response->redirect('admin/products/create');





        }
    }



    public function edit($id)
    {
        $this->data['sub_content']['msg'] = Session::flash('msg');

        $this->data['sub_content']['msgSuccess'] = Session::flash('msgSuccess');
        $this->data['page_title'] = 'Sửa '.$this->title;
        $this->data['sub_content']['title_child'] = "Sửa sản phẩm";
        //dữ liệu
        $this->data['sub_content']['product'] = $this->province->find($id);
        $this->data['sub_content']['categories'] = $this->db->table('categories')->get();
        $this->data['content']='admin/products/edit';

     return   $this->render('layouts/admin_layout',$this->data);
    }
    public function update($id){
        $request = new Request();
        $response = new response();
        $data = $request->getFields();

        $request->rules([
            'name'=>'required|min:5|unique:products:name:id'.$id,
            'price'=>'required',

            'category_id'=>'required',
            'content'=>'required|min:10'
        ]);
        $request->message([
            'name.required'=>'Tên sản phẩm không được để trống',
            'name.min'=>'Tên sản phẩm không đước ít hơn 5 ký tự',
            'name.unique'=>'Tên sản phẩm đã tồn tại',
            'price.required'=>'Giá sản phẩm không được để trống',

            'category_id.required'=>'Vui lòng chọn danh mục',
            'content.required'=>'Nội dung sản phẩm đang trống'
        ]);
        $validate = $request->validate();
        if(!$validate){
            Session::flash('msg','Cập Nhập sản phẩm không thành công');
            return $response->redirect('admin/products/edit/'.$id);
        }else{
            $dataNew= [
                'name'=>$data['name'],
                'category_id'=>$data['category_id'],
                'price'=>$data['price'],
                'content'=>trim($data['content']),

            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($data,'img','images');
            if(!empty($dataUploadFeatureImage)){
                $dataNew['feature_image_path']=$dataUploadFeatureImage['file_path'];
                $dataNew['feature_image_name']=$dataUploadFeatureImage['file_name'];
            }
            $this->db->table('products')->where('id','=',$id)->update($dataNew);
            Session::flash('msgSuccess', 'Cập Nhập Sản Phẩm Thành Công');
            return $response->redirect('admin/products/edit/'.$id);
        }
    }

    public function delete($id){
        $this->db->table('products')->where('id','=',$id)->delete($id);
        $datadelete= ['code'=>200,'message'=>'Thành Công'];
        $datadelete =json_encode($datadelete);// vì request ajax sẽ nhận dữ liệu chỉ bằng json

        echo $datadelete;
//   không thể return mà chỉ có thể echo thế nên phải tạo ra lớp trai để tối ưu code
    }

}