<?php

namespace Pierre\Http;


use Pierre\Controller\Controller;

class Router
{

    public function getRouteFromRequest(Request $request): Response
    {
        $url = $request->getUrl();

        $controller = new Controller();

        switch($url) {
            case '/':
                return $controller->homePage();
            case '/quizz':
                return $controller->quizzPage();
            case '/result':
                return $controller->resultPage();
        }

        throw new \Exception('Route not found');
    }
}