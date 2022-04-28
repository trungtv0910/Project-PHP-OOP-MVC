<?php
//class này là class kết nối cơ sở dữ liệu
class Connection
{
    private static $instance = null, $conn= null;
    private function __construct($config)
    {
        try {
            // cấu hình  dns
            $dsn= 'mysql:dbname='.$config['db'].';host='.$config['host'];

            //Cấu hình options
            /*
             * cấu hình utf 8
             * cấu hình ngoại lệ khi truy vấn bị lỗi
             */
            $options=[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ];
              $con = new PDO($dsn,$config['user'],$config['pass'],$options);

              self::$conn = $con;
        }catch (Exception $exception){
            $mess = $exception ->getMessage();
            $data['message']=$mess;
            App::$app->loadError('database',$data);
            die();
        }
    }
    public static function getInstance($config){
        if(self::$instance== null){
           $connection = new Connection($config);
             self::$instance= self::$conn;
        }
        return self::$instance;
    }
}