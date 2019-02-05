<?php

namespace Pierre;

use Pierre\Http\Request;
use Pierre\Http\Response;
use Pierre\Http\Router;

class Application
{
    public function handle(Request $request): Response
    {
        $router = new Router();

        try {
            return $router->getRouteFromRequest($request);
        }
        catch (\Exception $exception) {
            return $this->createPage404();
        }
    }

    private function createPage404()
    {
        $response = new Response('<h1>Cette page n\'existe pas</h1>');
        $response->setStatus(404);
        return $response;
    }
}