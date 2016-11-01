<?php

include_once './autoload.php';

include_once __DIR__ . '/app/Services/Response.php';
include_once __DIR__ . '/app/Services/Session.php';

$controller = filter_input(INPUT_GET, 'controller', FILTER_SANITIZE_STRING);
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

include_once __DIR__ . '/app/Http/Controllers/' . $controller . '.php';

if (class_exists($controller)) {
    $controller = new $controller();
    if (method_exists($controller, $action)) {
        $controller->$action();
    }
}



