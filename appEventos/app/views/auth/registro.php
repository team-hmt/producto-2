<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        main {
            text-align: center;
        }

        p {
            color: red;
        }
    </style>
</head>
<body>

<main>
    <form action="http://localhost/registro" method="post">
        <h1>Registro</h1>
        <label for="username">Usuario</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="pwd">Contraseña:</label><br>
        <input type="password" id="pwd" name="password"><br>
        <label for="confirmPassword">Confirmar contraseña:</label><br>
        <input type="password" id="confirmPassword" name="confirm_password"><br>
        <input type="submit" value="Submit">
    </form>
    <p>
        <?=
        /** @var string $errorMessage */
        htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8')
        ?>
    </p>
</main>

</body>
</html>