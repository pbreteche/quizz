<?php

namespace Pierre\Http;

class Request
{
    private $url;

    private $method;

    private $postContent;

    public static function generate()
    {
        $instance = new self();
        session_start();

        $instance->url = urldecode($_SERVER['REQUEST_URI']);
        $instance->method = $_SERVER['REQUEST_METHOD'];
        $instance->postContent = $_POST;

        return $instance;
    }


    public function getUrl()
    {
        return $this->url;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function writeSession(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function readSession(string $key)
    {
        return $_SESSION[$key];
    }

    public function getPostContent(string $key)
    {
        return $this->postContent[$key];
    }
}