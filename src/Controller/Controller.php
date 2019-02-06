<?php

namespace Pierre\Controller;

use Pierre\Html\HtmlLoader;
use Pierre\Http\Response;
use Pierre\Model\QuestionProvider;

class Controller
{

    private $loader;

    public function __construct()
    {
        $this->loader = new HtmlLoader();
    }

    public function homePage(array $urlParameters): Response
    {
        $content = $this->loader->load('HomePage');

        return new Response($content);
    }

    public function quizzPage(array $urlParameters): Response
    {
        var_dump($urlParameters);

        $provider = new QuestionProvider();
        $question = $provider->getQuestion();

        $content = $this->loader->load('Quizz', $question);

        return new Response($content);
    }

    public function resultPage(array $urlParameters): Response
    {
        $content = $this->loader->load('Result');

        return new Response($content);
    }
}