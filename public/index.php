<?php

require '../src/Http/Request.php';
require '../src/Http/Router.php';
require '../src/Home/Hier.php';

$httpRequest = \Pierre\Http\Request::generate();

$router = new \Pierre\Http\Router();

try {
    $router->getRouteFromRequest($httpRequest);
}
catch (\Exception $exception) {
    http_response_code(404);
    echo '<h1>Cette page n\'existe pas</h1>';
    die;
}

$hier = new \Pierre\Home\Hier();

echo '<h1>' . $hier->speak() . '</h1>';

