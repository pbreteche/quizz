<?php

namespace Pierre\Http;

class Response
{
    private $content;

    private $status;

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
        http_response_code($this->status);
        echo $this->content;
    }
}