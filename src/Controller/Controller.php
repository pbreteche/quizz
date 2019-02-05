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

    public function homePage(): Response
    {
        $content = $this->loader->load('HomePage');

        return new Response($content);
    }

    public function quizzPage(): Response
    {
        $provider = new QuestionProvider();
        $question = $provider->getQuestion();

        $content = $this->loader->load('Quizz', ['question' => $question]);

        return new Response($content);
    }

    public function resultPage(): Response
    {
        $content = $this->loader->load('Result');

        return new Response($content);
    }
}