<?php

namespace Http;


class Router
{

    public function getRouteFromRequest(Request $request)
    {
        if ('/' != $request->getUrl()) {
            throw new \Exception('Route not found');
        }

        echo 'si on arrive là, c\'est que l\'url est prise en charge';
    }

}