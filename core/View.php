<?php
// view được sử dụng cho nhiều view khác nhau mà giống nhau về dữ liệu như header, footer , đăng nhập tên tk
class View
{
    static public $dataShare = [];
    static public function share($data){
         self::$dataShare = $data;

    }
}