<?php

namespace App\Repository;

use App\Entity\Comment;


class CommentRepository
{


    public function findAll($page = 1, $pageSize = 10): array
    {
        $list = [];
        $connection = Database::getConnection();
        $offset = ($page - 1) * $pageSize;
        $query = $connection->prepare("SELECT * FROM comments  LIMIT :pageSize OFFSET :page");
        $query->bindValue('pageSize', $pageSize, \PDO::PARAM_INT);
        $query->bindValue('page', $offset, \PDO::PARAM_INT);

        $query->execute();
        foreach ($query->fetchAll() as $line) {
            $list[] = new Comment($line["comment"], $line["id_article"], $line["id"]);
        }
        return $list;
    }

    public function findById(int $id): ?Comment
    {
        $connection = Database::getConnection();

        $query = $connection->prepare("SELECT * FROM comments WHERE id=:id");
        $query->bindValue(":id", $id);
        $query->execute();
        foreach ($query->fetchAll() as $line) {
            return new Comment($line["comment"], $line["id_article"], $line["id"]);
        }
        return null;
    }

    public function persist(Comment $comment): void
    {
        $connection = Database::getConnection();

        $query = $connection->prepare("INSERT INTO comments (comment) VALUES (:comment, :id_article)");
        $query->bindValue(':comment', $comment->getComment());
        $query->bindValue(':id_article', $comment->getId_article());
        $query->execute();

        $comment->setId($connection->lastInsertId());
    }

    public function delete(int $id): void
    {
        $connection = Database::getConnection();

        $query = $connection->prepare("DELETE FROM comments WHERE id=:id");
        $query->bindValue(":id", $id);
        $query->execute();
    }

    public function update(Comment $comment): void
    {

        $connection = Database::getConnection();

        $query = $connection->prepare("UPDATE comments SET comment=:comment, id_article=:id_article WHERE id=:id");
        $query->bindValue(':comment', $comment->getComment());
        $query->bindValue(':id_article', $comment->getId_article());
        $query->execute();
    }


    public function search(string $term): array
    {
        $list = [];
        $connection = Database::getConnection();

        $query = $connection->prepare("SELECT * FROM comments WHERE comment LIKE :term");
        $query->bindValue(":term", "%" . $term . "%");
        $query->execute();
        foreach ($query->fetchAll() as $line) {
            $list[] = new Comment($line["comment"], $line["id_article"], $line["id"]);
        }
        return $list;
    }
}