<?php
include_once APPROOT . 'app/Auth.php';

function route(string $path, string $name): string
{
    $isActive = (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == $path);

    if ($isActive) {
        return '<li class="nav-item"><a href="'.$path.'" class="nav-link active" aria-current="page">'.$name.'</a></li>';
    }

    return '<li class="nav-item"><a href="'.$path.'" class="nav-link" aria-current="page">'.$name.'</a></li>';
}

?>

<div class="container-fluid">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <svg class="bi me-2" width="40" height="32">
                <use xlink:href="#bootstrap"/>
            </svg>
            <span class="fs-4"><?= APP_NAME ?></span>
        </a>

        <ul class="nav nav-pills">

            <?php if (\app\Auth::Check()): ?>
                <?= route("/movies", '<i class="bi bi-film"></i> Cartelera') ?>
                <?= route("/user", '<i class="bi bi-person-circle"></i> Usuario') ?>
                <?= route("/logout", '<i class="bi bi-box-arrow-right"></i> Logout') ?>
            <?php else: ?>
                <?= route("/login", '<i class="bi bi-box-arrow-in-right"></i> Login') ?>
                <?= route("/registro", '<i class="bi bi-person-plus-fill"></i> Registro') ?>
            <?php endif; ?>
        </ul>
    </header>
</div>