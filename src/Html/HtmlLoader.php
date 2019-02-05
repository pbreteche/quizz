<?php

namespace Pierre\Html;


class HtmlLoader
{

    public function load(string $filename, array $data=[]): string
    {

        ob_start();
        include __DIR__ . '/' . $filename . '.php';
        return ob_get_clean();
    }
}
