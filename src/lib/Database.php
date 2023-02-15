<?php

namespace Application\Lib\Database;

class DatabaseConnection
{
    public ?\PDO $database = null;

    public function getConnection(): \PDO
    {
        if ($this->database === null) {
            $this->database = new \PDO('mysql:host=localhost;dbname=essaie_5;charset=utf8', 'root', 'root');
            $this->database->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        return $this->database;
    }
}