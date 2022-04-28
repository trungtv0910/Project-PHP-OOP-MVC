<?php

class Cart extends Controller
{
    protected $title = 'Giỏ Hàng', $data, $model;

    public function __construct()
    {

    }

    public function index()
    {
        $this->data['sub_content']['title'] = 'Giỏ Hàng Của Tôi';
         $dataCart= $this->data['sub_content']['list_cart'] = Session::data('myCart');
        if(!empty($dataCart)){
            $this->data['content'] = 'cart/index';
        }else{
            $this->data['content'] = 'cart/nullCart';
        }
        $this->data['page_title'] = $this->title;
        return $this->render('layouts/client_layout', $this->data);
    }

    public function addToCard($id)
    {

           $request = new Request();

           $dataGet = $request->getFields();

           $dataProd = $dataGet;
           $dataNew = [$id => $dataProd];

           if (!empty(Session::data('myCart'))) {
               $cart = Session::data('myCart');
               if (array_key_exists($id, $cart)) {
                   $cart[$id]['qty'] += $dataProd['qty'];
               } else {
                   $cart[$id] = $dataProd;
               }
               Session::data('myCart', $cart);
           } else {
               Session::data('myCart', $dataNew);
           }
           $response = [
               'code' => 200,
               'message' => 'Sản phẩm đã được thêm vào giỏ hàng của bạn.'
           ];



        echo $response = json_encode($response);
    }


    public function deleteProdCart($id)
    {
        $response = '';
        if (Session::deleteParam('myCart', $id)) {
            $response = [
                'code' => 200,
                'message' => 'Sản phẩm đã được xoá khỏi giỏ hàng của bạn.'
            ];

        } else {
            $response = [
                'code' => 500,
                'message' => 'Sản phẩm không được xoá khỏi giỏ hàng của bạn.'
            ];
        }
        echo $response = json_encode($response);
    }

    public function updateQty($id)
    {
//        echo $id;
//        $request = new Request();
//        $data= $request->getFields();
//        $dataCart= Session::data('myCart')[$id]['qty']=$data['qty'];
//        Session::data('myCart', $dataCart);
//        echo '<pre>';
//        print_r($dataCart);
//        echo '</pre>';
    }
    public function checkOut(){
        $this->data['sub_content']['title'] = 'Thông Tin Thanh Toán';
        $this->data['sub_content']['msgSuccess']= Session::flash('msgSuccess');
        $this->data['sub_content']['msg']= Session::flash('msg');
        $dataCart= $this->data['sub_content']['list_cart'] = Session::data('myCart');

            $this->data['content'] = 'cart/checkOut';

        $this->data['page_title'] = $this->title;
        return $this->render('layouts/client_layout', $this->data);

    }
    public function confirmCheckOut(){
        $response = new Response();
        $request = new Request();
        $user_id = Session::data('client_login')['user_id'];

        $request->rules([
            'name'=>'required|min:5',
            'phone'=>'required|min:7',
            'email'=>'required',
            'address'=>'required'
        ]);
        $request->message([
            'name.required'=>'Vui nhập Họ Tên',
            'name.min'=>'Tên Quá Ngắn',
            'phone.required'=>'Vui lòng nhập số điện thoại',
            'phone.min'=>'Số điện thoại không hợp lệ',
            'email.required'=>'Vui lòng nhập Email',
            'address.required'=>'Vui lòng nhập địa chỉ'
        ]);
        $validate = $request->validate();
        $dataGet = $request->getFields();
        $dataCart = Session::data('myCart');
        if(!$validate){
            Session::flash('msg','Đặt Hàng Không Thành Công Vui Lòng Điền Đầy Đủ Thông Tin');
        }else{


            $info_bill =json_encode($dataGet, JSON_UNESCAPED_UNICODE);
            $content =json_encode($dataCart, JSON_UNESCAPED_UNICODE);
            $dataInsert = [
                'content'=>$content,
                'user_id'=>$user_id,
                'info_bill'=>$info_bill
            ];
            $this->db->table('bill')->insert($dataInsert);
            Session::flash('msgSuccess','Đặt Hàng Thành Công Đơn hàng sẽ sớm giao đến quý khách');
            Session::delete('myCart');
        }

        return $response->redirect('cart/checkOut');
    }
}