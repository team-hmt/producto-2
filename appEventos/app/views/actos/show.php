<?php

include_once APPROOT . 'app/Auth.php';

use app\Auth;

$id = $_GET['id'] - 1 ?? 1;

$params = [
    "movies" => [
        [
            "id" => 1,
            "title" => "Napoleón",
            "short_description" => "Napoleón es un espectáculo lleno de épica y acción que detalla el enrevesado ascenso y caída del icónico Emperador francés Napoleón Bonaparte, interpretado por el ganador del Oscar® Joaquim Phoenix.",
            "long_description" => "Napoleón es un espectáculo lleno de épica y acción que detalla el enrevesado ascenso y caída del icónico Emperador francés Napoleón Bonaparte, interpretado por el ganador del Oscar® Joaquim Phoenix. Tras un rodaje orquestado por el legendario director Ridley Scott sobre un deslumbrante telón de fondo a gran escala, la película muestra la incesante carrera de Bonaparte hasta el poder, a través del prisma de la adictiva y volátil relación con Josefina, la que fue su único amor verdadero, presentando sus visionarias tácticas políticas y militares a través de algunas de las secuencias prácticas de batallas más dinámicas jamás filmadas.",
            "img" => "https://www.ocinegirona.es/images/pelicules/5940.jpg"
        ],
        [
            "id" => 2,
            "title" => "Black Friday",
            "short_description" => "Tras un Black Friday en el que se producen disturbios que acaban en tragedia, un misterioso asesino aterroriza Plymouth, en Massachusetts. ",
            "long_description" => "Tras un Black Friday en el que se producen disturbios que acaban en tragedia, un misterioso asesino aterroriza Plymouth, en Massachusetts. ",
            "img" => "https://www.ocinegirona.es/images/pelicules/5879.jpg"
        ]
    ],
];

$movie = $params["movies"][$id]
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $movie["title"] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<?php
require_once APPROOT . 'app/views/widgets/appbar.php';
?>

<div class="container">
    <div class="card mt-4">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?= $movie["img"] ?>" class="img-fluid rounded-start" alt="<?= 'title' ?>">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $movie["title"] ?></h5>
                    <p class="card-text"><?= $movie["long_description"] ?></p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <?php if (Auth::isGuest()): ?>
                <div class="d-flex align-items-center">
                    <a href="/movies" class="btn btn-outline-primary me-2"><i class="bi bi-arrow-left"></i> Volver</a>
                    <form method="POST" action="/inscribe">
                        <input type="hidden" name="id" value="<?= $movie["id"] ?>">
                        <button type="submit" class="btn btn-primary ml-2">Inscribirse</button>
                    </form>
                </div>
            <?php else: ?>
                <a href="<?= "/movies" ?>" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Volver</a>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>