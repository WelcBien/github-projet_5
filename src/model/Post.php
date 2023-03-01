<?php

namespace Application\Model;

class Post
{
    public string $identifier;
    public string $title;
    public string $chapo;    
    public string $content;
    public string $frenchCreationDate;
    public string $author;    
    
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

    public function getTitle(): string {
            return $this->title;
        }

        public function setTitle(string $title) {
            $this->title = $title;
        }

    public function getChapo(): string {
            return $this->chapo;  
        }

        public function setChapo(string $chapo) {
            return $this->chapo = $chapo;
        }

    public function getContent(): string {
            return $this->content;
        }

        public function setContent(string $content) {
            $this->content = $content;
        }

    public function getFrenchCreationDate(): string {
            return $this->frenchCreationDate;
        }

        public function setFrenchCretionDate(string $frenchCreationDate) {
            $this->frenchCreationDate = $frenchCreationDate;
        }    

    public function getAuthor(): string {
            return $this->author;  
        }

        public function setAuthor(string $author) {
            return $this->author = $author;
        }
}