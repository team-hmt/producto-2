<?php

namespace app\controllers;

include_once APPROOT . "app/Auth.php";

use app\Auth;
use app\models\Usuario;
use app\Router;
use http\Message;

class LoginController
{
    /**
     * GET
     * Muestra la vista login.
     * @param string $message Mensaje a mostrar
     * @param string $errorMessage Mensaje de error del formulario a mostrar.
     * @return void
     */
    public function show(string $message = "", string $errorMessage = ""): void
    {
        require(APPROOT . 'app/views/auth/login.php');
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
            $this->show(errorMessage: "Por favor, ingrese un nombre de usuario");
            return;
        }
        else if(empty(trim($password))) {
            $this->show(errorMessage: "Por favor, ingrese una contraseña");
            return;
        }

        if (!Auth::login($username, $password, false)) {
            $this->show(errorMessage: "Usuario o contraseña incorrecta");
            return;
        }

        Router::redirect('/', null);
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