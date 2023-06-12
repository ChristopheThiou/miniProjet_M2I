<?php
use App\Repository\ArticleRepository;
use App\Repository\CategorieRepository;
use App\Repository\CommentRepository;

require '../vendor/autoload.php';

$repository = new ArticleRepository();

$repositoryC = new CategorieRepository();

$repositoryCo = new CommentRepository();

$articles = $repository->findAll();

var_dump($articles);

$categories = $repositoryC->findAll();

var_dump($categories);

$comments = $repositoryCo->findAll();

var_dump($comments);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
</head>

<body>

</body>

</html>