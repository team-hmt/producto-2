<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<?php
require_once APPROOT . 'app/views/widgets/appbar.php';
?>

<div class="container">

    <?php if (isset($params["message"])): ?>
        <div class="alert alert-warning" role="alert">
            <i class="bi bi-info-circle"></i> <?= /** @var array $params */ $params["message"]; ?>
        </div>
    <?php endif; ?>

    <main class="mt-4 row">
        <?php if (isset($params["movies"]) && count($params["movies"]) > 0): ?>
            <?php foreach ($params["movies"] as $index => $movie): ?>
                <div class="col-xl-3 col-lg-6 col-md-9 col-sm-12 mb-3 d-flex align-items-stretch">
                    <div class="card">
                        <img src="<?= $movie["img"] ?>" class="card-img-top" alt="movie image">
                        <div class="card-body">
                            <h5 class="card-title"><?= $movie["title"] ?></h5>
                            <p class="card-text"><?= $movie["short_description"] ?></p>
                        </div>
                        <div class="card-footer">
                            <a href="<?= "/movie?id=" . $movie["id"] ?>" class="btn btn-primary">Ver mas</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="alert alert-warning" role="alert">
                <i class="bi bi-film"></i> No hay películas disponibles en este momento.
            </div>
        <?php endif; ?>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>