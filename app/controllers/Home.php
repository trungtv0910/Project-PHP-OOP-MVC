<?php
//use models\HomeModel;
// với mỗi class home thì phải extends controller vào controller này ở Core\Controller
// phải require controller vào trong bootstrap.php
class Home extends Controller
{

    protected $province, $data;
    protected $title='Trang Chủ';
    public function __construct()
    {
//        require_once _DIR_ROOT.'/app/models/HomeModel.php';
        $this->province = $this->model('HomeModel');

    }
    public function index(){

        $this->data['sub_content']['title']= 'Danh sách sản phẩm Hot';
        $this->data['content'] = 'home/index';
        $this->data['page_title']= $this->title;
        $this->data['sub_content']['best_product']= $this->db->table('products')->orderBy('view_count','DESC')->first();
        $this->data['sub_content']['list_product_hot']=$this->db->table('products')->orderBy('view_count','DESC')->limit(4,1)->get();

        $this->data['sub_content']['list_product_all']= $this->db->table('products')->limit(12)->orderBy('id','DESC')->get();


      return  $this->render('layouts/client_layout',$this->data);
    }




    public function indexTest()
    {
        echo toSlug('Xin Chào');
/*
 * gọi session
 *
 */
//        Session::data('username');



//        $data = $this->province->get();
//        $data = $this->province->first();
        $data = $this->province->getListProvice();
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';

        echo '<hr>';
//    $dataGetModel= $this->province->get();
//        echo '<pre>';
//        print_r($dataGetModel);
//        echo '</pre>';


//        test last id với lớp trait
        $data = [
            'name' => 'Nguyễn Văn K',
            'quantity' => 125,
            'price' => 40000
        ];
//       $id= $this->province->insertUsers($data);
//echo $id;

        $data = $this->db->table('test')->get();
        echo '<pre>';
        print_r($data);
        echo '</pre>';
//       test insert mà không cần phải sang model
//        $dataIns=[
//            'name'=>'Trung Văn 1',
//            'quantity'=>125,
//            'price'=>40000
//        ];
//    $testInserr =  $this->db->table('test')->insert($dataIns);
//var_dump($testInserr);


    }


    public function testSession(){
        Session::data('username','Van trung');
        Session::data('username',['pass'=>1234,'email'=>'vantrung@gmail.com']);
//        $data['dulieu'] =$this->province->getList(); // với câu lệnh phức tạp thì có thể dunngf cách này nhưng cùi bắp === Sẻ thay thế bằng query builder
//        return $this->render('home/index',$data);;

//        echo '<pre>';
//        print_r( Session::data('username') ); //lấy 1 sesseion với username
//        echo '</pre>';
        Session::data('infoDetail','Unicode');

        echo '<pre>';
        print_r( Session::data() ); //lấy 1 tất  cả các session
        echo '</pre>';

//        xoá Session
        Session::delete('infoDetail');
        echo 'Session sau khi xoá là:';
        echo '<pre>';
        print_r( Session::data() ); //lấy 1 tất  cả các session
        echo '</pre>';
echo '<hr>';
/*
 * Mục đích của flash là để thêm những câu thông báo chỉ tồn tại rồi bị xoá đi
 */
Session::flash('msg','thêm dữ liệu thành công');
$msg= Session::flash('msg');
echo $msg;




    }
    public function detail($id = '', $slug = '')
    {
        echo 'id sản phẩm =' . $id;
        echo 'Tên không dấu :' . $slug;
        $data = $this->province->getDetailProvice($id);
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        $datafind = $this->province->find($id);
        echo '<pre>';
        print_r($datafind);
        echo '</pre>';
    }

    public function search()
    {
        if (isset($_GET['keyword'])) {
            $keyword = $_GET['keyword'];
            echo 'từ khoá cần tìm ' . $keyword;
        }
    }

    public function update($id)
    {
        $data = [
            'name' => 'Nguyễn Văn E',
            'quantity' => 123,
            'price' => 500000
        ];

        return $this->province->updateUser($data, $id);
    }

    public function delete($id)
    {
        return $this->province->deleteUser($id);

    }

    public function create()
    {
//        $this->data['errors']=Session::flash('errors');
        $this->data['msg']=Session::flash('msg');
//        $this->data['old']=Session::flash('old');
        return $this->render('users/add',$this->data);

    }

    public function get_category()
    {
        $request = new Request();
        $data = $request->getFields();


    }

//    làm post cho validate
    public function post_user()
    {
        $userId = 3;
        $request = new Request();
        if ($request->isPost()) { // kiêmtra đây có phải là post hay get nếu là get thì trả về response
            $data = $request->getFields();

            /* Set Rules*/
            $request->rules([
                    'fullname' => 'required|min:5|max:30',
                    'email' => 'required|email|min:6|unique:users:email',
                    'password' => 'required|min:3',
                    'confirm_password' => 'required|min:3|match:password',
                    'age' => 'required|callback_check_age',
                ]
            );
            /*
             * unique là trường duy nhâts :tên bảng (users) : tên trường muốn so sánh (email)
             * với trường hợp là edit thì truyền vào cho nó cái id vd:  'email' => 'required|email|min:6|unique:users:email:id='.$userId, // với userId được truyền từ ngoài vào
             */
            //set message
            $request->message([
                'fullname.required' => 'Họ tên không được để trống',
                'fullname.min' => 'Họ tên lớn hơn 5 ký tự',
                'fullname.max' => 'Họ tên nhở hơn 30 ký tự',
                'email.required' => 'Email không được để trống',
                'email.unique'=>'Tên email đã tồn tại',
                'email.email' => 'Định dạng Email không hợp lệ ',
                'email.min' => 'Email phải lớn hơn 6 ký tự',
                'password.required' => 'Password không được để trống',
                'password.min' => 'Password lớn hơn 3 ký tự',
                'confirm_password.required' => 'Password confirm không được để trống',
                'confirm_password.min' => 'Password confirm phải lớn hơn 3 ký tự',
                'confirm_password.match' => 'Password không trùng khớp',
                'age.required'=>'tuổi không được để trống',
                'age.callback_check_age'=>'Tuổi không được nhỏ hơn 20'

            ]);
            $validate = $request->validate(); // validate này nó sẽ trả về 2 giá trị là true hoặc false

            if (!$validate) {
//                Session::flash('errors',$request->errors()); // thay thế session:flash error cho cái data['error']
//                $this->data['errors'] = $request->errors();
                /*
                 * Tại sao có thể bỏ qua được Session::flash ('errors',$request->errors())
                 * vì đã có helper ở core nó đã khởi tạo được rerror
                 */
                Session::flash('msg','Đã có lỗi xãy ra');
//                $this->data['msg'] = 'Đã có lỗi xãy ra';
//                Session::flash('old',$request->getFields());
//                $this->data['old'] = $request->getFields();
                /*
                 *Tại sao có hể bỏ qua Session::flash('old',$request->getFields()); tại vì đã có helper xữ lý
                 */

            }
//            else{
//                //           với trường hợp thành công thì nó sẽ truy cập đến trang khác và thông báo thêm thành công
//                $response = new Response();
//                $response->redirect('home/create');
//            }
//            $this->render('users/add', $this->data);


        }
            $response = new Response();
            $response->redirect('home/create');


    }

    // post này để ứng dụng cho post thông thường
    public function post_category()
    {
        $request = new Request();
        $data = $request->getFields();
        $response = new Response();
//      return  $response->redirect('https://google.com');
        return $response->redirect('home/create');


    }
    public function check_age($age){
         if($age>=20){return true;}
         return false;
    }

}