<?php

namespace Application\Model;

class Contact
{
    public string $identifier;   
    public string $lastname;
    public string $firstname;    
    public string $email;
    public string $message;
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

    public function getMessage(): string {
            return $this->message;  
        }

        public function setMessage(string $message) {
            return $this->message = $message;
        }

    public function getFrenchCreationDate(): string {
            return $this->frenchCreationDate;
        }

        public function setFrenchCretionDate(string $frenchCreationDate) {
            $this->frenchCreationDate = $frenchCreationDate;
        }    

}