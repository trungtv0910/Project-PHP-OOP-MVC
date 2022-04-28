<?php

class Categories extends Controller
{
    protected $title = 'Category';
    protected $province, $data;

    public function __construct()
    {
        $this->data['sub_content']['title'] = 'Quản Lý Danh Mục';
        $this->province = $this->model('CategoriesModel');
    }


    public function index()
    {
        $this->data['page_title'] = $this->title;
        $this->data['content'] = 'admin/categories/index';
        $this->data['sub_content']['title_child'] = "Danh sách danh mục";
        $this->data['sub_content']['categories'] = $this->db->table('categories')->orderBy('id', 'DESC')->get();
        $this->data['sub_content']['list_parent_cate'] =$this->province->all();
        return $this->render('layouts/admin_layout', $this->data);
    }

    public function create()
    {

        $this->data['sub_content']['msg'] = Session::flash('msg');
        $this->data['sub_content']['title_child'] = 'Thêm Danh Mục';
        $this->data['page_title'] = $this->data['sub_content']['title_child'];
        $this->data['sub_content']['categories'] = $this->province->all();
        $this->data['content'] = 'admin/categories/add';
        return $this->render('layouts/admin_layout', $this->data);
    }

    public function store()
    {
        $request = new Request();
        $response = new Response();
        $data = $request->getFields();
        $request->rules([
            'name' => 'required|unique:categories:name|min:5',
        ]);
        $request->message([
            'name.required' => 'Vui lòng không để trống tên danh mục',
            'name.unique' => 'Tên danh mục đã tồn tại',
            'name.min' => 'Tên danh mục không được dưới 5 ký tự'
        ]);
        $validate = $request->validate();
        if (!$validate) {
            Session::flash('msg', 'Thêm không thành công');

            $response->redirect('admin/categories/create');
        } else {
            $dataNew = [
                'name' => $data['name'],
                'parent_id' => $data['parent_id'],
            ];
            $this->db->table('categories')->insert($dataNew);
            return $response->redirect('admin/categories/index');
        }
    }

//    edit
    public function edit($id)
    {
        $this->data['sub_content']['msg']=Session::flash('msg');
        $this->data['sub_content']['msgSuccess']=Session::flash('msgSuccess');

        $this->data['sub_content']['categories'] = $this->province->all();
        $this->data['sub_content']['category'] = $this->province->find($id);
        $this->data['sub_content']['title_child'] = 'Sửa Danh Mục';
        $this->data['page_title'] = $this->data['sub_content']['title_child'];
        $this->data['content'] = 'admin/categories/edit';
        return $this->render('layouts/admin_layout', $this->data);
    }

//    update
    public function update($id)
    {
        $request = new Request();
        $response = new Response();
        $data = $request->getFields();
        $request->rules([
            'name' => 'required|min:5|unique:categories:name:id='.$id,
        ]);
        $request->message([
            'name.required' => 'Vui lòng không để trống tên danh mục',
            'name.unique' => 'Tên danh mục đã tồn tại',
            'name.min' => 'Tên danh mục không được dưới 5 ký tự'
        ]);
        $validate = $request->validate();
        if(!$validate){
            Session::flash('msg', 'Cập nhập không thành công');
            return $response->redirect('admin/categories/edit/'.$id);
        }else{
            $dataNew= [
                'name'=>$data['name'],
                'parent_id'=>$data['parent_id']
            ];
            $this->db->table('categories')->where('id','=',$id)->update($dataNew);
            Session::flash('msgSuccess', 'Cập nhập thành công');
            return $response->redirect('admin/categories/edit/'.$id);
        }
    }

//    delete
public function delete($id){
    $this->db->table('categories')->where('id','=',$id)->delete($id);
    $datadelete= ['code'=>200,'message'=>'Thành Công'];
    $datadelete =json_encode($datadelete);// vì request ajax sẽ nhận dữ liệu chỉ bằng json

   echo $datadelete;
//   không thể return mà chỉ có thể echo thế nên phải tạo ra lớp trai để tối ưu code
}


}