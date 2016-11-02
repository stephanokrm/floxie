<?php

require __DIR__ . '/bootstrap/autoload.php';
require __DIR__ . '/app/Services/Response.php';
require __DIR__ . '/app/Services/Session.php';

$routes['produtos'] = ['controller' => 'ProductController', 'action' => 'index'];
$routes['produto/detalhes'] = ['controller' => 'ProductController', 'action' => 'show'];

$url = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$request = $routes[substr($url, 15)];

$controller = $request['controller'];
$action = $request['action'];

include_once __DIR__ . '/app/Http/Controllers/' . $controller . '.php';

if (class_exists($controller)) {
    $controller = new $controller();
    if (method_exists($controller, $action)) {
        $controller->$action();
    }
}



