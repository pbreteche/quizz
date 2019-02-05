<?php

require '../vendor/autoload.php';

$httpRequest = \Pierre\Http\Request::generate();
$app = new \Pierre\Application();
$response = $app->handle($httpRequest);

$response->send();
