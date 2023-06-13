<?php
use App\Repository\ArticleRepository;
use App\Repository\CategorieRepository;
use App\Repository\CommentRepository;

require '../vendor/autoload.php';

$repository = new ArticleRepository();

$repositoryC = new CategorieRepository();

$repositoryCo = new CommentRepository();

$articles = $repository->findAll();

$categories = $repositoryC->findAll();

$comments = $repositoryCo->findAll();


$articles = $repository->findById($_GET["id"]);

$categories = $repositoryC->findById($_GET["id"]);

$comments = $repositoryCo->findByCom($_GET["id"])






    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/layout.css">
    <title>Article</title>
</head>

<body class="container-fluid">

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"> <img id="logo" src="https://cdn.pixabay.com/photo/2019/06/27/21/14/logo-4303138_1280.png" alt="oui"> </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <div class="container-fluid">
        <h1>
            <?= $articles->getTitle() ?>
        </h1>
        <p>
            <?= $articles->getContent() ?>
        </p>
        <p>By
            <?= $articles->getAuthor() ?>
        </p>
        <div class="container-fluid mx-auto">
            <img id="img" class="container-fluid" src="<?= $articles->getImg() ?>" alt="non">
        </div>
        <p>
            <?php foreach ($repositoryCo->findByCom($articles->getId()) as $key => $com) {
                echo $com->getComment();
            }
            ?>
        </p>

    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>