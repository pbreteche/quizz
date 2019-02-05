<?php

namespace Pierre\Model;


class QuestionProvider
{
    const LIST = [
        'C\'est quoi cette bouteille de lait ?',
        'Qu\'est-ce que l\'univers?',
        'Quelle est la différence entre un gendarme ?',
    ];

    public function getQuestion()
    {
        $choice = random_int(0, 2);

        return self::LIST[$choice];
    }
}