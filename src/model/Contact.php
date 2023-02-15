<?php

namespace Application\Model\Contact;

require_once('src/lib/Database.php');

use Application\Lib\Database\DatabaseConnection;

class ContactRepository 
{
    public DatabaseConnection $connection;

    // Enregistrer le message 
    public function send($lastname, $firstname, $email, $msg) 
    {
        $statement = $this->connection->getConnection()->prepare(
            'INSERT INTO contact (lastname, firstname, email, msg) VALUES ( ?, ?, ?, ?)'
        );
        $statement->execute([$lastname, $firstname, $email, $msg]);
    }
}