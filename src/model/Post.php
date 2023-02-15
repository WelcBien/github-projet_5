<?php

namespace Application\Model\Post;

require_once('src/lib/Database.php');

use Application\Lib\Database\DatabaseConnection;

class Post
{
    public string $title;
    public string $chapo;
    public string $frenchCreationDate;
    public string $content;
    public string $author;    
    public string $identifier;
}

class PostRepository
{
    public DatabaseConnection $connection;

    public function getPost(string $identifier): Post
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, title, chapo, content, author, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS 
french_creation_date FROM posts WHERE id = ?"
        );
        $statement->execute([$identifier]);

        $row = $statement->fetch();
        $post = new Post();
        $post->title = $row['title']; 
        $post->chapo = $row['chapo'];       
        $post->frenchCreationDate = $row['french_creation_date'];
        $post->content = $row['content'];
        $post->author = $row['author'];
        $post->identifier = $row['id'];

        return $post;
    }

    public function getPosts(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT id, title, chapo, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS 
french_creation_date FROM posts ORDER BY creation_date DESC LIMIT 0, 9"
        );
        $posts = [];
        while (($row = $statement->fetch())) {
            $post = new Post();
            $post->title = $row['title'];
            $post->chapo = $row['chapo'];            
            $post->frenchCreationDate = $row['french_creation_date'];
            $post->identifier = $row['id'];

            $posts[] = $post;
        }

        return $posts;
    }

    public function createPost(string $title, string $chapo, string $content, string $author, int $user_id): int
    {
        $statement = $this->connection->getConnection()->prepare(
            'INSERT INTO posts(title, chapo, content, author, creation_date, users_id) VALUES(?, ?, ?, ?, NOW(), ?)'
        );        

        $affectedLines = $statement->execute([$title, $chapo, $content, $author, $user_id]);

        return $this->connection->getConnection()->lastInsertId();
    }

    public function updatePost(string $title, string $chapo, string $content, string $author, int $id): int
    {
        $statement = $this->connection->getConnection()->prepare(
            'UPDATE posts SET title = ?, chapo = ?, content = ?, author = ? WHERE id = ?'
        );
        $affectedLines = $statement->execute([$title, $chapo, $content, $author, $id]);

        return ($affectedLines > 0);
    }
    
    function deletePost($id): int
    {
        $statement = $this->connection->getConnection()->prepare(
            "DELETE FROM posts WHERE id = ?"
        );    
            $affectedLines = $statement->execute([$id]);

            return ($affectedLines > 0);
    }
}