<?php

namespace Pierre\Model;


class Question
{
    private $seriesTitle;
    private $title;
    private $choices;

    public static function createFromArray(array $series): self
    {
        $question = new self();

        $question->title = $series['title'];
        $question->seriesTitle = $series['series_title'];

        $question->choices = [
            [
                'label' => $series['good_choice'],
                'good' => true,
            ],
            [
                'label' => $series['bad_choice_1'],
                'good' => false,
            ],
            [
                'label' => $series['bad_choice_2'],
                'good' => false,
            ],
        ];

        shuffle($question->choices);

        return $question;
    }

    public function getSeriesTitle(): string
    {
        return $this->seriesTitle;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getChoices(): array
    {
        return $this->choices;
    }


}