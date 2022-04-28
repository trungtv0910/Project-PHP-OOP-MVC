<?php
$config['app'] = [
    'service' => [
        HtmlHelper::class
    ],
    'routeMiddleware' => [
        'san-pham' => AuthMiddleware::class,
        'login_admin'=> AuthMiddleware::class,
        'admin/dashboard'=> AuthMiddleware::class,
        'admin/categories'=> AuthMiddleware::class,
        'admin/login'=> AuthMiddleware::class,
        'admin/products'=>AuthMiddleware::class,
        'admin/users'=>AuthMiddleware::class,
        'client_login'=>AuthClientMiddleware::class,
        'client_cart'=>AuthClientMiddleware::class


    ],
    'globalMiddleware' => [
        ParamsMiddleware::class

    ],
    'boot' => [
        AppserviceProvider::class
    ]
];