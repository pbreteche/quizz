<?php

namespace Pierre\Exception;


class RouteNotFoundException extends \Exception
{
    public function __construct(
        string $message = "Route not found",
        int $code = 0,
        \Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}