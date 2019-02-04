<?php

require '../src/Http/Request.php';
require '../src/Http/Router.php';
require '../src/Home/Hier.php';

$httpRequest = Http\Request::generate();

$router = new \Http\Router();

try {
    $router->getRouteFromRequest($httpRequest);
}
catch (\Exception $exception) {
    http_response_code(404);
    echo '<h1>Cette page n\'existe pas</h1>';
    die;
}

$hier = new \Home\Hier();

echo '<h1>' . $hier->speak() . '</h1>';

