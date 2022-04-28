<?php
/*
 * Đây là helper được xây dựng sẳn của hệ thống
 * $before là các thẻ  thông báo lỗi vi du :<span style="color:red" >Lỗi</span>
 */
$sessionKey = Session::isInvalid();
$errors = Session::flash($sessionKey . '_errors');
$old = Session::flash($sessionKey . '_old');

if (!function_exists('form_error')) { // kiếm tra cái funtion này nó có tồn tại hay không thì mới đc định nghĩa
    function form_error($fieldName, $before = '', $after = '')
    {
        global $errors; //em xem lại biến toàn cục đi em. Biến toàn cục khai báo ngoài hàm, trong hàm phải dùng từ khoá global $tenbien mới có thể sử dụng được.
        if (!empty($errors) && array_key_exists($fieldName, $errors)) {
            return $before . $errors[$fieldName] . $after;
        }
        return false;
    }
}

if (!function_exists('old')) {
    function old($fieldName, $default = '')
    {
        global $old;
        if (!empty($old[$fieldName])) {
            return $old[$fieldName];
        }
        return $default;
    }
}