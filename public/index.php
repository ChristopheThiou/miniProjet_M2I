<?php
use App\Repository\ArticleRepository;
use App\Repository\CategorieRepository;
use App\Repository\CommentRepository;

require '../vendor/autoload.php';

$repository = new ArticleRepository();

$repositoryC = new CategorieRepository();

$repositoryCo = new CommentRepository();

/* $articles = $repository->findAll();

$articles = $repository->findByCat(2);

var_dump($articles);

$categories = $repositoryC->findAll();

var_dump($categories);

$comments = $repositoryCo->findAll();

var_dump($comments); */


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Acceuil</title>
</head>

<body class="container-fluid">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
            <p >Cuisine du monde</p>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

</body>

</html>