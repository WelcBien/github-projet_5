<?php

namespace Application\Model;

class Comment
{
    public string $identifier;   
    public string $frenchCreationDate;
    public string $comment;
    public string $post;

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

    public function getFrenchCreationDate(): string {
            return $this->frenchCreationDate;
        }

        public function setFrenchCretionDate(string $frenchCreationDate) {
            $this->frenchCreationDate = $frenchCreationDate;
        }

    public function getComment(): string {
            return $this->comment;
        }

        public function setComment(string $comment) {
            $this->comment = $comment;
        }

    public function getPost(): string {
            return $this->post;  
        }

        public function setPost(string $post) {
            $this->post = $post;
        }

}
