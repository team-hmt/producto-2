<?php

namespace app\controllers;

use app\models\Usuario;
use app\Router;

class LoginController
{
    /**
     * GET
     * Entrypoint para login
     * @return void
     */
    public function showLogin(): void
    {
        $this->showLoginWithMessage("");
    }

    /**
     * POST
     * Entrypoint para formulario post login
     * @return void
     */
    public function handleLoginSubmission(): void
    {
        // Get post params
        // trigger register

        $username = $this->_sanitizeInput($_POST['username']);
        $password = $this->_sanitizeInput($_POST['password']);

        $this->processLogin($username, $password);
    }

    /**
     * Muestra la vista login
     * @param string $errorMessage Error a mostrar en login.
     * @return void
     */
    private function showLoginWithMessage(string $errorMessage): void
    {
        require(APPROOT . 'app/views/auth/login.php');
    }

    /**
     * @param string $username Usuario a autenticar
     * @param string $password Contraseña del usuario a autenticar
     * @return void
     */
    private function processLogin(string $username, string $password): void
    {
        // Verify input
        // Verify user
        // Verify password

        // TODO reenviar usuario (evita reiniciar el formulario en caso de error)
        if(empty(trim($username))) {
            $this->showLoginWithMessage("Por favor, ingrese un nombre de usuario");
            return;
        }
        else if(empty(trim($password))) {
            $this->showLoginWithMessage("Por favor, ingrese una contraseña");
            return;
        }

        $user = Usuario::getUserByName($username);

        if (empty($user->Password)) {
            $this->showLoginWithMessage("Usuario o contraseña incorrecta");
            return;
        }

        if (!password_verify($password, $user->Password)) {
            $this->showLoginWithMessage("Usuario o contraseña incorrecta");
            return;
        }

        Router::redirect('/home');
    }

    /**
     * TODO
     * @param string $var nombre del parametro a verificar
     * @return string Texto verificado
     */
    private function _sanitizeInput(string $var): string
    {
        return $var;

        //$sanitizedInput = filter_input(INPUT_POST, $var, FILTER_UNSAFE_RAW);
        //return $sanitizedInput !== null ? $sanitizedInput : '';
    }
}