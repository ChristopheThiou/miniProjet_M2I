<?php

namespace App\Repository;

use App\Entity\Categorie;


class CategorieRepository
{


    public function findAll($page = 1, $pageSize = 10): array
    {
        $list = [];
        $connection = Database::getConnection();
        $offset = ($page - 1) * $pageSize;
        $query = $connection->prepare("SELECT * FROM categories  LIMIT :pageSize OFFSET :page");
        $query->bindValue('pageSize', $pageSize, \PDO::PARAM_INT);
        $query->bindValue('page', $offset, \PDO::PARAM_INT);

        $query->execute();
        foreach ($query->fetchAll() as $line) {
            $list[] = new Categorie($line["categorie"], $line["id"]);
        }
        return $list;
    }

    public function findById(int $id): ?Categorie
    {
        $connection = Database::getConnection();

        $query = $connection->prepare("SELECT * FROM categories WHERE id=:id");
        $query->bindValue(":id", $id);
        $query->execute();
        foreach ($query->fetchAll() as $line) {
            return new Categorie($line["categorie"], $line["id"]);
        }
        return null;
    }

    public function persist(Categorie $categorie): void
    {
        $connection = Database::getConnection();

        $query = $connection->prepare("INSERT INTO categories (categorie) VALUES (:categorie)");
        $query->bindValue(':categorie', $categorie->getCategorie());
        $query->execute();

        $categorie->setId($connection->lastInsertId());
    }

    public function delete(int $id): void
    {
        $connection = Database::getConnection();

        $query = $connection->prepare("DELETE FROM categories WHERE id=:id");
        $query->bindValue(":id", $id);
        $query->execute();
    }

    public function update(Categorie $categorie): void
    {

        $connection = Database::getConnection();

        $query = $connection->prepare("UPDATE categories SET categorie=:categorie WHERE id=:id");
        $query->bindValue(':categorie', $categorie->getCategorie());
        $query->execute();
    }


    public function search(string $term): array
    {
        $list = [];
        $connection = Database::getConnection();

        $query = $connection->prepare("SELECT * FROM categories WHERE categorie LIKE :term");
        $query->bindValue(":term", "%" . $term . "%");
        $query->execute();
        foreach ($query->fetchAll() as $line) {
            $list[] = new Categorie($line["categorie"], $line["id"]);
        }
        return $list;
    }
}