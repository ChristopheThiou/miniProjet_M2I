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



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="css/layout.css">
    <title>Acceuil</title>
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



    <div id="carouselExample" class="carousel slide w-50 mx-auto">
        <div class="carousel-inner">
            <?php foreach ($articles as $key => $item) { ?>

                <div class="carousel-item <?php
                if ($key == 0) {
                    echo 'active';
                }
                ?>">
                    <div>
                        <?= $item->getTitle() ?>
                        By
                        <?= $item->getAuthor() ?>
                    </div>
                    <a href="article.php?id=<?= $item->getId() ?>"><img id="img" src="<?= $item->getImg() ?>" class="d-block w-100"
                            alt="oui"></a>
                    <div>
                        <?=
                            $repositoryC->findById($item->getId_categorie())->getCategorie()

                            ?>
                    </div>
                </div>
                <?php

            }

            ?>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>