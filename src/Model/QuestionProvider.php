<?php

namespace Pierre\Model;


class QuestionProvider
{

    public function getQuestion()
    {
        $config = parse_ini_file(__DIR__ . '/../../config/parameters.ini');

        $pdo = new \PDO($config['dsn'], $config['username'], $config['password']);

        $stmt = $pdo->query('SELECT q.id, q.title FROM question q WHERE q.id=1');
        $stmt->execute();
        return $stmt->fetch()['title'];
    }
}