<?php

namespace Application\Model;

use Application\Lib\DatabaseConnection;

class CommentRepository
{
    public DatabaseConnection $connection; 
    
    
    public function commentValide($valide) 
    {
        $statement = $this->connection->getConnection()->prepare(
            'UPDATE comments SET valide = 1 WHERE id = ?'
        );
        $affectedLines = $statement->execute([$valide]);

        return ($affectedLines > 0);
    }


    public function getComments(string $post): array
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, comment, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS 
            french_creation_date, posts_id FROM comments WHERE posts_id = ? AND valide = 1 ORDER BY comment_date DESC"
        );
        $statement->execute([$post]);

        $comments = [];
        while (($row = $statement->fetch())) {
            $comment = new Comment();
            $comment->identifier = $row['id'];           
            $comment->frenchCreationDate = $row['french_creation_date'];
            $comment->comment = $row['comment'];
            $comment->post = $row['posts_id'];

            $comments[] = $comment;
        }

        return $comments;
    }

    public function getComment(string $identifier): ?Comment
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, comment, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS 
                french_creation_date, posts_id FROM comments WHERE id = ?"
        );
        $statement->execute([$identifier]);

        $row = $statement->fetch();
        if ($row === false) {
            return null;
        }

        $comment = new Comment();
        $comment->identifier = $row['id'];        
        $comment->frenchCreationDate = $row['french_creation_date'];
        $comment->comment = $row['comment'];
        $comment->post = $row['posts_id'];

        return $comment;
    }

    public function createComment(string $post, string $comment): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'INSERT INTO comments(posts_id, comment, comment_date, users_id, valide) VALUES(?, ?, NOW(), ?, false)'
        );        

        $affectedLines = $statement->execute([$post, $comment, $_SESSION['id']]);

        return ($affectedLines > 0);
    }

    public function updateComment(string $identifier, string $comment): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'UPDATE comments SET comment = ? WHERE id = ?'
        );
        $affectedLines = $statement->execute([$comment, $identifier]);

        return ($affectedLines > 0);
    }


    public function deleteComment(string $identifier): int
    {
        $statement = $this->connection->getConnection()->prepare(
            'DELETE FROM comments WHERE id =?'
        );
        $affectedLines = $statement->execute([$identifier]);

        return ($affectedLines > 0);
    }
    
    
    public function getCommentsInvalid(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT id, comment, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS 
            french_creation_date, posts_id FROM comments WHERE valide != 1 ORDER BY comment_date DESC"
        );
        
        $comments = [];
        while (($row = $statement->fetch())) {
            $comment = new Comment();
            $comment->identifier = $row['id'];           
            $comment->frenchCreationDate = $row['french_creation_date'];
            $comment->comment = $row['comment'];
            $comment->post = $row['posts_id'];

            $comments[] = $comment;
        }

        return $comments;
    }
   
}