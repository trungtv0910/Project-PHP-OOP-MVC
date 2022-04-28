<?php
class App{
    private $__controller, $__action, $__params, $__routes, $__db;


    static public $app;

    public function __construct()
    {

        global $routes,$config;
        self::$app =$this;

        $this->__routes = new Route();
        if(!empty($routes['default_controller'])){
            $this->__controller = $routes['default_controller']; // sau này sẽ chuyển controller sang config để điều hướng
        }

        $this->__action ='index'; // action là đuo
        $this->__params = []; // param là tham số

        if(class_exists('DB')){ // kiểm tra xem có tồn tại class DB hay không?
            //        khởi tạo DB
            $dbObject = new DB();
            $this->__db  = $dbObject->db;
        }


        /*
         * $this->>db->table('province')->get() nhưng mà tôi không muốn vậy
         *  Query builder sẻ không được viết ở đây
         *
         *
         */
        $this->handleUrl();

    }
    function getUrl(){
        if(!empty($_SERVER['PATH_INFO'])){
            $url =$_SERVER['PATH_INFO'];
        }else{
            $url='/';
        }
        return $url;
    }
    public function handleUrl(){

        $url =$this->getUrl();

        $url = $this->__routes ->handleRoute($url);

        // gọi GlobalMiddleware
        $this->handleGlobalMiddleware($this->__db);
        // gọi Middleware App
        $this->handleRouteMiddleware($this->__routes->getUri(),$this->__db);

        //Appservice Provider
        $this->handleAppServiceProvider($this->__db);


        $urlArr = array_filter(explode('/',$url));
        // với array_filter lọc ký tự khoảng trắng ở 2 đầu
        $urlArr = array_values($urlArr);
        //với array_value thì nó đưa mảng về đúng bản chất bắt đầu từ 0 và về đúng giá trị của nó


        $urlCheck = '';
        if(!empty($urlArr)){
            foreach ($urlArr  as $key => $item){
               $urlCheck .=$item.'/';
               $fileCheck = rtrim($urlCheck,'/');
               $fileArr = explode('/',$fileCheck);
               $fileArr[count($fileArr)-1]= ucfirst($fileArr[count($fileArr)-1]);
                $fileCheck = implode('/',$fileArr); // implode là nối mảng

                if(!empty($urlArr[$key-1])){
                    unset($urlArr[$key-1]);
                }

               if(file_exists('app/controllers/'.$fileCheck.'.php')){
                   $urlCheck= $fileCheck;
                   break;
               }
            } $urlArr =array_values($urlArr);
        }




        // xử lý controller
        if(!empty($urlArr[0])){
            $this->__controller =ucfirst($urlArr[0]); // ucfirst mục đích biến ký tự đầu thành ký tự hoa vì controller sử dụng ký tự hoa ở đầu
        }else{
            $this->__controller =ucfirst($this->__controller);
        }

// xử lý khi $urlCheck Rỗng
        if(empty($urlCheck)){
            $urlCheck = $this->__controller;
        }


        if(file_exists('app/controllers/'.$urlCheck.'.php')){
            require_once 'controllers/'.$urlCheck.'.php';

            //kiểm tra class $this->__controller có tồn tại trùng với tên file controller trong hệ thống hay không ?
            if(class_exists($this->__controller)){
                $this->__controller = new $this->__controller(); //mục đích chuyển controller thành object
               if(!empty($this->__db)){ // kiểm tra xem thằng __db nó có tồn tại và có dữ liệu hay không
                   $this->__controller->db=$this->__db;// gáng db ở bên file core/controller
               }
            }else{
                return $this->loadError('404');
            }

            // $this->__controller ->index();
//               sau khi đã có url0 thì ta xoá nó đi
            unset($urlArr[0]);
        }else{
          return  $this->loadError('404');
        }


        //xử lý action
        if(!empty($urlArr[1])){

           $this->__action = $urlArr[1];
            unset($urlArr[1]);
        }

        //xử lú params
        $this->__params = array_values($urlArr);
//        kiểm tra method action tồn tại
//        mục đích của call_user_func_array là gọi đến function trong từng controller để chạy function đó
        if(method_exists($this->__controller,$this->__action)){
            call_user_func_array([$this->__controller,$this->__action],$this->__params); //Gọi lại hàm và chạy các hàm cần thiết
        }else{
            return $this->loadError('404');
        }


    }

    public function getCurrentController(){
        return $this->__controller;
    }

    public function loadError($name='404',$data =[]){
        extract($data);
        require_once 'errors/'.$name.'.php';

    }
    public function handleRouteMiddleware($routeKey,$db){
        global $config;
        //Load Middleware App
        $routeKey = trim($routeKey);
        if (!empty($config['app']['routeMiddleware'])) {
            $routeMiddleWareArr = $config['app']['routeMiddleware'];
            foreach ($routeMiddleWareArr as $key => $middleWareItem) {
                if ($routeKey == trim($key) && file_exists('app/middlewares/' . $middleWareItem . '.php')) {
                    require_once 'app/middlewares/' . $middleWareItem . '.php';
                    if (class_exists($middleWareItem)) {
                        $middleWareObject = new $middleWareItem();
                       if(!empty($db)){
                           $middleWareObject->db =$db;
                       }
                        $middleWareObject->handle();
                    }
                }
            }
        }
    }

    public function handleGlobalMiddleware($db){
        global $config;
        if (!empty($config['app']['globalMiddleware'])) {
            $globalMiddleWareArr = $config['app']['globalMiddleware'];
            foreach ($globalMiddleWareArr as $key => $middleWareItem) {
                if (file_exists('app/middlewares/' . $middleWareItem . '.php')) {
                    require_once 'app/middlewares/' . $middleWareItem . '.php';
                    if (class_exists($middleWareItem)) {
                        $middleWareObject = new $middleWareItem();
                        if(!empty($db)){
                            $middleWareObject->db =$db;
                        }
                        $middleWareObject->handle();
                    }
                }
            }
        }
    }
    public function handleAppServiceProvider($db){
    global $config;
        if (!empty($config['app']['boot'])) {
            $serviceProviderArr= $config['app']['boot'];
            foreach ($serviceProviderArr as  $serviceName) {
                if (file_exists('app/core/' .  $serviceName . '.php')) {
                    require_once 'app/core/' .  $serviceName . '.php';
                    if (class_exists( $serviceName)) {
                        $serviceObject = new  $serviceName();
                        if(!empty($db)){
                            $serviceObject->db =$db;
                        }
                        $serviceObject->boot();
                    }
                }
            }
        }
    }
}