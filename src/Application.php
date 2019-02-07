<?php

namespace Pierre;

use Pierre\Exception\DataNotFoundException;
use Pierre\Exception\RouteNotFoundException;
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
        catch (RouteNotFoundException | DataNotFoundException $exception) {
            return $this->createPage404($exception->getMessage());
        }
        catch (\Exception $exception) {
            return $this->createPage500($exception->getMessage());
        }
    }

    private function createPage404(string $message)
    {
        $response = new Response('<h1>Cette page n\'existe pas</h1><p>' . $message .'</p>');
        $response->setStatus(404);
        return $response;
    }

    private function createPage500(string $message)
    {
        $response = new Response('<h1>Un problème est survenu, un stagiaire va s\'en occuper</h1><p>' . $message .'</p>');
        $response->setStatus(500);
        return $response;
    }
}