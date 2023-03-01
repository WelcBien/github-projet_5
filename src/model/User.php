<?php

namespace Application\Model;

class User
{
    public string $identifier;   
    public string $pseudo;
    public string $firstname;
    public string $lastname;
    public string $email;
    public string $password;
    public string $frenchCreationDate;

    public function __construct($value = array()) {
        if (!empty($value)) {
            $this->hydrate($value);
        }
    }

    public function hydrate($data) {
        foreach($data as $attribut => $value) {
            $method = 'set' .str_replace(' ', '', ucwords(str_replace('_', ' ', $attribut)));
            if(is_callable(array($this, $method))) {

            }
        }
    }

    public function getIdentifier(): int { 
            return $this->identifier;
        }

        public function setIdentifier(int $identifier) {
            $this->identifier = $identifier;
        }

    public function getPseudo(): int { 
            return $this->pseudo;
        }

        public function setPseudo(int $pseudo) {
            $this->pseudo = $pseudo;
        }

    public function getLastname(): string {
            return $this->lastname;
        }

        public function setLastname(string $lastname) {
            $this->lastname = $lastname;
        }

    public function getFirstname(): string {
            return $this->firstname;  
        }

        public function setFirstname(string $firstname) {
            return $this->firstname = $firstname;
        }

    public function getEmail(): string {
            return $this->email;
        }

        public function setEmail(string $email) {
            $this->email = $email;
        }

    public function getPassword(): string {
            return $this->password;  
        }

        public function setPassword(string $password) {
            return $this->password = $password;
        }

    public function getFrenchCreationDate(): string {
            return $this->frenchCreationDate;
        }

        public function setFrenchCretionDate(string $frenchCreationDate) {
            $this->frenchCreationDate = $frenchCreationDate;
        }    

}