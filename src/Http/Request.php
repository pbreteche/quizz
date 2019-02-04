<?php

namespace Pierre\Http;

class Request
{
    private $url;

    public static function generate()
    {
        $instance = new self();

        $instance->url = urldecode($_SERVER['REQUEST_URI']);

        return $instance;
    }


    public function getUrl()
    {
        return $this->url;
    }
}