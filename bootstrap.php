<?php
define('_DIR_ROOT', __DIR__);
// xử lý http root
if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $web_root = 'https://' . $_SERVER['HTTP_HOST'];
} else {
    $web_root = 'http://' . $_SERVER['HTTP_HOST'];
}
$dirRoot = str_replace('\\','/',_DIR_ROOT);

$documentRoot = str_replace('\\','/',$_SERVER['DOCUMENT_ROOT']);

$folder = str_replace(strtolower($documentRoot), '', strtolower($dirRoot));

$web_root = $web_root.$folder;



define('_WEB_ROOT', $web_root);
/*
 * Tự Động Load tất cả các file nằm trong config
 *
 */
$configs_dir = scandir('configs');// tìm đến file configs
// include, require tất cả
if (!empty($configs_dir)) {
    foreach ($configs_dir as $item) {
        if ($item != '.' && $item != '..' && file_exists('configs/' . $item)) {
            require_once 'configs/' . $item;
        }
    }
}

require_once 'configs/routes.php';// chú ý require configs routes trước khi config xảy ra

//load All services
if (!empty($config['app']['service'])) {
    $allServices = $config['app']['service'];
    if (!empty($allServices)) {
        foreach ($allServices as $serviceName) {
            if (file_exists('app/core/' . $serviceName . '.php ')) {
                require_once 'app/core/' . $serviceName . '.php';
            }
        }
    }
}
//Load service provider class
require_once 'core/ServiceProvider.php';

//Load View Class
require_once 'core/View.php';

//Load
require_once 'core/Load.php';

//Middleware
require_once 'core/Middlewares.php';

require_once 'core/Route.php';// load Route Class

require_once 'core/Session.php';// load Session trước app vì session ở phần nào cũng có tuy nhiên route thì k cần session

//kiểm tra config và load Database
if (!empty($config)) {
    $db_config = array_filter($config['database']);
    if (!empty($db_config)) {
        require_once 'core/Connection.php';// require tới core/connct
        require_once 'core/QueryBuilder.php';
        require_once 'core/Database.php';
        require_once 'core/DB.php';

//        $z =$db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}
// Load core Helpers
require_once 'core/Helper.php';
//Load all helpers
$allHelpers = scandir('app/helpers');
if (!empty($allHelpers)) {
    foreach ($allHelpers as $item) {
        if ($item != '.' && $item != '..' && file_exists('app/helpers/' . $item)) {
            require_once 'app/helpers/' . $item;
        }
    }
}


require_once 'app/App.php'; // load app



require_once 'core/Model.php'; // load base model Chú ý:: Phải load sau database vì nó exten từ Database

require_once 'core/Template.php'; // load template

//requier controller phải require sau app
require_once 'core/Controller.php'; // load base controller

require_once 'core/Request.php'; // load Request

require_once 'core/Response.php'; // load Response