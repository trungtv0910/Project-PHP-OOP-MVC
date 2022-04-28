<?php
$routes['default_controller']='home';

/*
 *
 * Đường dẫn ảo sẻ trỏ đến đường dẫn thật
 */

$routes['san-pham']= 'product/index';
$routes['trang-chu']= 'home';
$routes['tin-tuc/.+-(\d+).html']= 'news/category/$1';
$routes['admin/categories']= 'admin/categories';
$routes['admin/dashboard']= 'admin/dashboard';
$routes['admin/login']= 'admin/dashboard';
$routes['admin/products']= 'admin/products';
$routes['admin/users']= 'admin/users';


$routes['client_login']= 'login';
$routes['client_cart']= 'cart';

