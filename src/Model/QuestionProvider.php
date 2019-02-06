<?php

namespace Pierre\Model;


class QuestionProvider
{

    /**
     * @var \PDO
     */
    private $pdo;

    public function getQuestion()
    {
        if (!$this->pdo) {
            $this->connect();
        }

        $stmt = $this->pdo->query(
            'SELECT q.id, q.title, q.good_choice, q.bad_choice_1, q.bad_choice_2 ' .
            'FROM question q WHERE q.id=1'
        );
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getSeries(string $seriesSlug, int $questionNumber = 1): Question
    {
        if (!$this->pdo) {
            $this->connect();
        }

        $index = $questionNumber - 1;

        $stmt = $this->pdo->prepare(
            'SELECT s.id, s.title as series_title, s.slug, q.title, q.good_choice, q.bad_choice_1, q.bad_choice_2
            FROM series s 
            JOIN series_question sq ON s.id = sq.series_id
            JOIN question q ON sq.question_id = q.id
            WHERE s.slug=:slug
            LIMIT :index, 1'
        );

        $stmt->bindValue(':slug', $seriesSlug);
        $stmt->bindValue(':index', $index, \PDO::PARAM_INT);
        $stmt->execute();
        $series = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!$series) {
            var_dump($stmt->errorInfo());
            throw new \Exception('Le quizz «' . $seriesSlug . '» n\'existe pas');
        }

        $question = Question::createFromArray($series);

        return $question;
    }

    private function connect()
    {
        $config = parse_ini_file(__DIR__ . '/../../config/parameters.ini');

        $this->pdo = new \PDO($config['dsn'], $config['username'], $config['password']);
    }
}