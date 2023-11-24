<?php

namespace app\controllers;

include_once APPROOT . 'app/models/Usuario.php';

use app\models\Usuario;
use app\Router;

class RegisterController
{
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
        // TODO autologin
        // TODO implement tipo usuario
        // TODO reenviar usuario (evita reiniciar el formulario en caso de error)

        // Verify input
        // Verify user
        // Hash password
        // Make and save User
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
        $user->Id_tipo_usuario = 1;
        $user->Save();

        Router::redirect('/login');
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