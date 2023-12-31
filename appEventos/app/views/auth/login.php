<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<div class="d-flex flex-column vh-100 bg-body-tertiary">

    <?php
    require_once APPROOT . 'app/views/widgets/appbar.php';
    ?>

    <div class="flex-grow-1 d-flex align-items-center justify-content-center">
        <main class="w-50 rounded p-5 shadow bg-body">
            <form action="" method="post">
                <h1 class="h3 mb-3 fw-normal">Inicia sesión</h1>

                <div class="form-floating mb-2">
                    <input name="username" type="text" class="form-control" id="userInput" placeholder>
                    <label for="userInput">Nombre de usuario</label>
                </div>
                <div class="form-floating mb-2">
                    <input name="password" type="password" class="form-control" id="passwordInput" placeholder>
                    <label for="passwordInput">Contraseña</label>
                </div>

                <div class="form-check text-start my-3">
                    <input class="form-check-input" id="rememberMe" type="checkbox" value="remember-me">
                    <label class="form-check-label" for="rememberMe">
                        Recuérdame
                    </label>
                </div>
                <!--<div class="d-flex justify-content-end">
                    <a href="" class="btn btn-link">¿Olvidaste tu contraseña?</a>
                </div>-->
                <button class="btn btn-primary w-100 py-2" type="submit">Iniciar sesión</button>
                <p class="mt-3 text-muted">¿No tienes una cuenta? <a href="http://localhost:80/registro">Regístrate</a></p>
            </form>
            <p class="text-danger">
                <?=
                /** @var string $errorMessage */
                htmlspecialchars($errorMessage ?? "input error msg", ENT_QUOTES, 'UTF-8')
                ?>
            </p>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>