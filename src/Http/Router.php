<?php

namespace Pierre\Http;


use Pierre\Controller\Controller;
use Pierre\Exception\RouteNotFoundException;

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
                if (count($urlElements) != 2) continue;
                if ($request->getMethod() === 'POST') {
                    return $controller->responsePage($urlElements);
                }
                return $controller->quizzPage($urlElements);
            case 'result':
                return $controller->resultPage($urlElements);
        }

        throw new RouteNotFoundException();
    }
}