<?php
include_once APPROOT . 'app/Auth.php';

function route(string $path, string $name): string
{
    $isActive = ($_SERVER['REQUEST_URI'] == $path) ? 'active' : '';

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
            <?= route("/movies", "Movies") ?>

            <?php if (\app\Auth::isGuest()): ?>
                <?= route("/login", "Login") ?>
                <?= route("/registro", "Registro") ?>
            <?php else: ?>
                <?= route("/user", "Usuario") ?>
            <?php endif; ?>
        </ul>
    </header>
</div>