<?php

namespace Pierre\Controller;


use Pierre\Http\Response;

class Controller
{

    public function homePage()
    {
        return new Response('<h1> Accueil </h1>');
    }

    public function quizzPage()
    {
        return new Response('<h1> Quizz </h1>');
    }

    public function resultPage()
    {
        return new Response('<h1> Résultat </h1>');
    }
}