<?php

namespace Pierre\Controller;

use Pierre\Exception\BadControllerParameterException;
use Pierre\Html\HtmlLoader;
use Pierre\Http\Request;
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
        var_dump($_SESSION);
        $this->validateQuizzParameters($urlParameters);
        $provider = new QuestionProvider();
        $question = $provider->getSeries($urlParameters[0], (int)$urlParameters[1]);

        $content = $this->loader->load('Quizz', ['question' => $question]);

        return new Response($content);
    }

    public function resultPage(array $urlParameters): Response
    {
        $content = $this->loader->load('Result');

        return new Response($content);
    }

    public function responsePage(array $urlParameters, Request $request): Response
    {
        $currentResponse = $request->getPostContent('response');
        $previousResponses = $request->readSession('response') ?? [];
        $previousResponses[] = $currentResponse;
        $request->writeSession('response', $previousResponses);
        $urlParameters[1]++;
        $response = new Response('');
        $response->addHeader('Location', '/quizz/' . implode('/', $urlParameters));
        $response->setStatus(303);
        return $response;
    }

    private function validateQuizzParameters(array $parameters): void
    {
        $seriesSlug = $parameters[0];

        if (!$seriesSlug) {
            throw new BadControllerParameterException('Il faut nous dire quelle série passer');
        }

        $questionNumber = $parameters[1];
        if (!is_numeric($questionNumber)) {
            var_dump($questionNumber);
            throw new BadControllerParameterException('Il faut nous donner un numéro de question');
        }
    }
}