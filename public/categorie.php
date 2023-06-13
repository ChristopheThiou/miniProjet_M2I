<?php
use App\Repository\ArticleRepository;
use App\Repository\CategorieRepository;
use App\Repository\CommentRepository;

require '../vendor/autoload.php';

$repository = new ArticleRepository();

$repositoryC = new CategorieRepository();

$repositoryCo = new CommentRepository();

$categories = $repositoryC->findAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/layout.css">
    <title>Categorie</title>
</head>

<body class="container-fluid">

<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <a class="navbar-brand" href="index.php"> <img id="logo"
                src="https://cdn.pixabay.com/photo/2019/06/27/21/14/logo-4303138_1280.png" alt="oui"> </a>
    </nav>

    <h1 class="text-center">Blog cuisine</h1>

<div class="container-fluid">
        <h2>Liste categories</h2>
        <div class="row g-3">
            <?php foreach ($categories as $item) { ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">
                                <?= $item->getCategorie() ?>
                            </h3>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

</body>

</html>