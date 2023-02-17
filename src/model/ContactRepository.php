<?php

namespace Application\Model;

use Application\Lib\DatabaseConnection;

class ContactRepository 
{
    public DatabaseConnection $connection;
     
    public function send($lastname, $firstname, $email, $msg) 
    {
        $statement = $this->connection->getConnection()->prepare(
            'INSERT INTO contact (lastname, firstname, email, msg) VALUES ( ?, ?, ?, ?)'
        );
        $statement->execute([$lastname, $firstname, $email, $msg]);
    }
}