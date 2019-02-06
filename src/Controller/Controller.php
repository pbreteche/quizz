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
        $seriesSlug = $urlParameters[0];

        if (!$seriesSlug) {
            throw new \Exception('Il faut nous dire quelle série passer');
        }

        $questionNumber = $urlParameters[1];

        $provider = new QuestionProvider();
        $question = $provider->getSeries($seriesSlug, (int)$questionNumber);

        $content = $this->loader->load('Quizz', ['question' => $question]);

        return new Response($content);
    }

    public function resultPage(array $urlParameters): Response
    {
        $content = $this->loader->load('Result');

        return new Response($content);
    }
}