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

    public function getSeries(string $seriesSlug)
    {
        if (!$this->pdo) {
            $this->connect();
        }

        $stmt = $this->pdo->prepare(
            'SELECT s.id, s.title, s.slug ' .
            'FROM series s WHERE s.slug=:slug'
        );

        $stmt->bindValue(':slug', $seriesSlug);
        $stmt->execute();
        $series = $stmt->fetch();

        if (!$series) {
            throw new \Exception('Le quizz «' . $seriesSlug . '» n\'existe pas');
        }
        return $series;
    }

    private function connect()
    {
        $config = parse_ini_file(__DIR__ . '/../../config/parameters.ini');

        $this->pdo = new \PDO($config['dsn'], $config['username'], $config['password']);
    }
}