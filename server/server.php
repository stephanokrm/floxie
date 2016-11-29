<?php

require __DIR__ . '/bootstrap/autoload.php';
require __DIR__ . '/app/Services/Response.php';
require __DIR__ . '/app/Services/Session.php';

$routes['produtos'] = ['controller' => 'ProductController', 'action' => 'index'];
$routes['produto'] = ['controller' => 'ProductController', 'action' => 'show'];
$routes['comentario'] = ['controller' => 'ProductController', 'action' => 'addComment'];
$routes['comentarios'] = ['controller' => 'ProductController', 'action' => 'getComments'];

$method = filter_input(INPUT_SERVER, 'REQUEST_METHOD');

$url = urldecode(parse_url(filter_input(INPUT_SERVER, 'REQUEST_URI'), PHP_URL_PATH));
$route = str_replace('/', '', substr($url, 15));
$id = intval(preg_replace('/[^0-9]+/', '', $route), 10);
$request = $routes[preg_replace('/[0-9]+/', '', $route)];
$controller = $request['controller'];
$action = $request['action'];

include_once __DIR__ . '/app/Http/Controllers/' . $controller . '.php';

if (class_exists($controller)) {
    $controller = new $controller();
}
if (method_exists($controller, $action)) {
    switch ($method) {
        case 'GET':
            $controller->$action($id);
            break;
        case 'POST';
            $data = (object) filter_input_array(INPUT_POST);
            $controller->$action($data);
            break;
    }
}







