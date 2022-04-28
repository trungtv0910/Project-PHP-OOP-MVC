
<?php
//<!--controler này tương tự base_controller và được dùng để use các requie hoặc include các file-->
class Controller{
    public $db;

    public function model($model){

        if(file_exists(_DIR_ROOT.'/app/models/'.$model.'.php')){
            require_once _DIR_ROOT.'/app/models/'.$model.'.php';
           if(class_exists($model)){
               $model = new $model();
               return  $model;
           }
        }
        return false;
    }
    public  function  render($view,$data=[]){
        /*
         * nếu có đata share thì chúng có thể dùng chung data tức là có thể dùng chung hiển thị data tài khoản v.v
         */
        if(!empty(View::$dataShare)){
            $data = array_merge($data,View::$dataShare); // array_merge là nối 2 mảng lại với nhau
        }

        extract($data); // extract đổi các key của mảng thành biến
        ob_start();
        if(file_exists(_DIR_ROOT.'/app/views/'.$view.'.php')){
            require_once _DIR_ROOT.'/app/views/'.$view.'.php';
        }else{
            echo 'Directory không tồn tại';
        }
//        $contentView = ob_get_contents();
//        ob_end_clean();
//        $template = new Template();
//        $template->run($contentView);



    }
    public  function  view($view,$data=[]){
        require_once _DIR_ROOT.'/app/views/'.$view.'.php';
    }
}