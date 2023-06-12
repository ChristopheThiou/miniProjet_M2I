<?php

namespace App\Repository;

use App\Entity\Article;


class ArticleRepository
{


    public function findAll($page = 1, $pageSize = 10): array
    {
        $list = [];
        $connection = Database::getConnection();
        $offset = ($page - 1) * $pageSize;
        $query = $connection->prepare("SELECT * FROM articles  LIMIT :pageSize OFFSET :page");
        $query->bindValue('pageSize', $pageSize, \PDO::PARAM_INT);
        $query->bindValue('page', $offset, \PDO::PARAM_INT);

        $query->execute();
        foreach ($query->fetchAll() as $line) {
            $list[] = new Article($line["title"], $line["author"], $line["content"], $line["img"], $line["id_categorie"], $line["id"]);
        }
        return $list;
    }

    public function findById(int $id): ?Article
    {
        $connection = Database::getConnection();

        $query = $connection->prepare("SELECT * FROM articles WHERE id=:id");
        $query->bindValue(":id", $id);
        $query->execute();
        foreach ($query->fetchAll() as $line) {
            return new Article($line["title"], $line["author"], $line["content"], $line["img"], $line["id_categorie"], $line["id"]);
        }
        return null;
    }

    public function persist(Article $article): void
    {
        $connection = Database::getConnection();

        $query = $connection->prepare("INSERT INTO articles (title,author,content,img,id_categorie) VALUES (:title,:author,:content,:img,:id_categorie)");
        $query->bindValue(':title', $article->getTitle());
        $query->bindValue(':author', $article->getAuthor());
        $query->bindValue(':content', $article->getContent());
        $query->bindValue(':img', $article->getImg());
        $query->bindValue(':id_categorie', $article->getId_categorie());
        $query->execute();

        $article->setId($connection->lastInsertId());
    }

    public function delete(int $id): void
    {
        $connection = Database::getConnection();

        $query = $connection->prepare("DELETE FROM articles WHERE id=:id");
        $query->bindValue(":id", $id);
        $query->execute();
    }

    public function update(Article $article): void
    {

        $connection = Database::getConnection();

        $query = $connection->prepare("UPDATE articles SET title=:title, author=:author, content=:content, img=:img, id_categorie=:id_categorie WHERE id=:id");
        $query->bindValue(':title', $article->getTitle());
        $query->bindValue(':author', $article->getAuthor());
        $query->bindValue(':content', $article->getContent());
        $query->bindValue(':img', $article->getImg());
        $query->bindValue(':id_categorie', $article->getId_categorie());
        $query->execute();
    }


    public function search(string $term): array
    {
        $list = [];
        $connection = Database::getConnection();

        $query = $connection->prepare("SELECT * FROM articles WHERE title LIKE :term OR author LIKE :term");
        $query->bindValue(":term", "%" . $term . "%");
        $query->execute();
        foreach ($query->fetchAll() as $line) {
            $list[] = new Article($line["title"], $line["author"], $line["content"], $line["img"], $line["id_categorie"], $line["id"]);
        }
        return $list;
    }
}