<?php

namespace Pierre\Http;


use Pierre\Controller\Controller;

class Router
{

    public function getRouteFromRequest(Request $request): Response
    {
        $url = trim($request->getUrl(), '/');
        $urlElements = explode('/', $url);

        $action = array_shift($urlElements);

        $controller = new Controller();

        switch($action) {
            case '':
                return $controller->homePage($urlElements);
            case 'quizz':
                return $controller->quizzPage($urlElements);
            case 'result':
                return $controller->resultPage($urlElements);
        }

        throw new \Exception('Route not found');
    }
}