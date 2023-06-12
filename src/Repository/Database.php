<?php

namespace App\Repository;


class Database
{

    public static function getConnection()
    {
        return new \PDO("mysql:host=localhost;dbname=mini_projet", "root", "");
    }
}