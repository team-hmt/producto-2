<?php

namespace app\controllers;

include_once APPROOT . 'app/models/Usuario.php';

use app\models\Usuario;
use http\Client\Curl\User;

class Auth
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

        if (password_verify($password, $user->Password)) {
            echo "Logged In";
        } else {
            $this->showLoginWithMessage("Usuario o contraseña incorrecta");
        }
    }


    /**
     * GET
     * Entrypoint para registro
     * @return void
     */
    public function showRegistro(): void
    {
        $this->showRegistroWithMessage("");
    }

    /**
     * Entrypoint para formulario post registro
     * @return void
     */
    public function handleRegistroSubmission(): void
    {
        // Get post params
        // trigger register

        $username = $this->_sanitizeInput($_POST['username']);
        $password = $this->_sanitizeInput($_POST['password']);
        $confirm_password = $this->_sanitizeInput($_POST['confirm_password']);

        $this->processRegistro($username, $password, $confirm_password);
    }

    /**
     * Muestra la vista registro
     * @param string $errorMessage Error a mostrar en login.
     * @return void
     */
    private function showRegistroWithMessage(string $errorMessage): void
    {
        require(APPROOT . 'app/views/auth/registro.php');
    }

    /**
     * @param string $username usuario a registrar
     * @param string $password password del usuario
     * @param string $confirm_password password del usuario
     * @return void
     */
    private function processRegistro(string $username, string $password, string $confirm_password): void
    {
        // Verify input
        // Verify user
        // Hash password
        // Make User
        // Save User

        // TODO reenviar usuario (evita reiniciar el formulario en caso de error)
        if(empty(trim($username))) {
            $this->showRegistroWithMessage("Error: Please enter a username.");
            return;
        }
        else if(empty(trim($password))) {
            $this->showRegistroWithMessage("Error: Please enter a password.");
            return;
        }
        else if(empty(trim($confirm_password))) {
            $this->showRegistroWithMessage("Error: Please confirm your password.");
            return;
        }
        else if($password !== $confirm_password) {
            $this->showRegistroWithMessage("Error: Password and confirm password do not match.");
            return;
        }

        if (Usuario::Exists($username)) {
            $this->showRegistroWithMessage("Error: User already exists.");
            return;
        }

        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $user = new Usuario();
        $user->Username = $username;
        $user->Password = $password_hash;

        // TODO implement tipo usuario
        $user->Id_tipo_usuario = 1;

        $user->Save();
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