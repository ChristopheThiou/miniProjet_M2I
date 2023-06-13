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
    <title>Categorie</title>
</head>

<body>

<div class="container-fluid">
        <h1>Liste categories</h1>
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

<!-- <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">
        <?php
        foreach ($repositoryC->findAll()as $key => $item) {
         echo $item->getCategorie();
    }
    ?>
    </h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div> -->
</body>

</html>