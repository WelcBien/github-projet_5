<?php

namespace Application\Model;

use Application\Lib\DatabaseConnection;

class UserRepository
{
    public DatabaseConnection $connection;

    public function getUsers(): array
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, pseudo, firstname, lastname, email, password, DATE_FORMAT(date, '%d/%m/%Y à %Hh%imin%ss') AS 
            french_creation_date, FROM users WHERE users_id = ? ORDER BY date DESC"
        );       
        $users = [];
        while (($row = $statement->fetch())) {
            $user = new User();
            $user->identifier = $row['id'];
            $user->pseudo = $row['pseudo'];
            $user->firstname = $row['firstname'];
            $user->lastname = $row['lastname'];
            $user->email = $row['email'];
            $user->password = $row['password'];          
            $user->frenchCreationDate = $row['french_creation_date'];
            
            $users[] = $user;
        }

        return $users;
    }

    public function getUser(string $identifier): User
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, pseudo, firstname, lastname, email, password, DATE_FORMAT(date, '%d/%m/%Y à %Hh%imin%ss') AS 
                french_creation_date FROM users WHERE id = ?"
        );
        $statement->execute([$identifier]);

        $row = $statement->fetch();
        if ($row === false) {
            return null;
        }

        $user = new User();
        $user->identifier = $row['id'];        
        $user->pseudo = $row['pseudo'];
        $user->firstname = $row['firstname'];
        $user->lastname = $row['lastname'];
        $user->email = $row['email'];
        $user->password = $row['password'];          
        $user->frenchCreationDate = $row['french_creation_date'];

        return $user;
    }
    // Enregistrer l'utilisateur
    public function register($pseudo, $firstname, $lastname, $email, $password) 
    {
        $statement = $this->connection->getConnection()->prepare(
            "INSERT INTO users (pseudo, firstname, lastname, email, password) VALUES ( ?, ?, ?, ?, ?)"
        );
        $statement->execute([$pseudo, $firstname, $lastname, $email, $password]);

        return $statement->fetch();
    }

    //vérification de l'utilisateur dans la bdd 
    public function userExist($pdeudo)
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM users WHERE pseudo = ?"
        );
        $statement->execute([$pdeudo]);        
        
        return $statement->fetch();       
    } 


    public function connectUser($pseudo)
    { 
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM users WHERE pseudo = ?"
        );
        $statement->execute([$pseudo]);

        return $statement->fetch();       
    }

    public function password_verify($password)
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM users WHERE password = ?"
        );
        $statement->execute(['password_verify', $password]);

        return $statement->fetch();                
    }
    
}




  