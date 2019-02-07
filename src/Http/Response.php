<?php

namespace Pierre\Http;

class Response
{
    private $content;

    private $status;

    private $headers = [];

    public function __construct(string $content)
    {
        $this->status = 200;
        $this->content = $content;
    }

    public function setStatus(int $status)
    {
        $this->status = $status;
    }

    public function send(): void
    {
        foreach($this->headers as $headerName => $headerValue) {
            header($headerName . ': ' . $headerValue);
        }
        http_response_code($this->status);
        echo $this->content;
    }

    public function addHeader(string $name, string $value)
    {
        $this->headers[strtolower($name)] =  $value;
    }
}