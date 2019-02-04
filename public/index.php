<?php

require '../src/Http/Request.php';
require '../src/Http/Router.php';

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

