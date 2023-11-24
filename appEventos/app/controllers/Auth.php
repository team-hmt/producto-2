<?php

namespace app\controllers;

include_once APPROOT . 'app/models/Usuario.php';

use app\models\Usuario;

class Auth
{

    /**
     * Entrypoint
     * @return void
     */
    public function login_get(): void
    {
        $this->_login_get("");
    }

    /**
     * Entrypoint
     * @return void
     */
    public function register_get(): void
    {

    }

    /**
     * Entrypoint
     * @return void
     */
    public function login_post(): void
    {
        // Get post params
        // trigger register

        $username = $this->_sanitizeInput($_POST['username']);
        $password = $this->_sanitizeInput($_POST['password']);

        $this->_login_post($username, $password);
    }

    /**
     * Entrypoint
     * @return void
     */
    public function registro_post(): void
    {
        // Get post params
        // trigger register

        $username = $this->_sanitizeInput($_POST['username']);
        $password = $this->_sanitizeInput($_POST['password']);
        $confirm_password = $this->_sanitizeInput($_POST['confirm_password']);

        $this->_registro_post($username, $password, $confirm_password);
    }

    /**
     * @param string $errorMessage Error a mostrar en login.
     * @return void
     */
    private function _login_get(string $errorMessage): void
    {
        require(APPROOT . 'app/views/auth/login.php');
    }

    private function _register_get(string $errorMessage): void
    {

    }

    /**
     * @param string $username Usuario a autenticar
     * @param string $password Contraseña del usuario a autenticar
     * @return void
     */
    private function _login_post(string $username, string $password): void
    {
        // Verify input
        // Verify user
        // Verify password

        if(empty(trim($username))) {
            $this->_login_get("Error: Please enter a username.");
            return;
        }
        else if(empty(trim($password))) {
            $this->_login_get("Error: Please enter a password.");
            return;
        }

        $user = Usuario::getUserByName($username);

        if (empty($user->Password)) {
            $this->_login_get("Error: User not found.");
            return;
        }

        if (password_verify($password, $user->Password)) {
            echo "Logged In";
        } else {
            echo "Incorrect password";
        }
    }

    /**
     * @param string $username usuario a registrar
     * @param string $password password del usuario
     * @param string $confirm_password password del usuario
     * @return void
     */
    private function _registro_post(string $username, string $password, string $confirm_password): void
    {
        // Verify input
        // Verify user
        // Hash password
        // Make User
        // Save User

        if(empty(trim($username))) {
            echo "Error: Please enter a username.";
            return;
        }
        else if(empty(trim($password))) {
            echo "Error: Please enter a password.";
            return;
        }
        else if(empty(trim($confirm_password))) {
            echo "Error: Please confirm your password.";
            return;
        }
        else if($password !== $confirm_password) {
            echo "Error: Password and confirm password do not match.";
            return;
        }

        if (Usuario::Exists($username)) {
            echo "Error: User already exists.";
            return;
        }

        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $user = new Usuario();
        $user->Username = $username;
        $user->Password = $password_hash;

        // TODO implement
        $user->Id_tipo_usuario = 1;

        $user->Save();
    }

    private function _sanitizeInput($input): string
    {
        return $input;

        // TODO
        //$sanitizedInput = filter_input(INPUT_POST, $input, FILTER_UNSAFE_RAW);
        //return $sanitizedInput !== null ? $sanitizedInput : '';
    }
}