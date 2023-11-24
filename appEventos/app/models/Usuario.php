<?php

namespace app\models;

include_once APPROOT . 'database/AppDatabase.php';

use database\AppDatabase;
use PDO;

class Usuario {

    public int $Id_usuario;
    public string $Username;
    public string $Password;
    public int $Id_Persona;
    public int $Id_tipo_usuario;

    /**
     * @param string $username username to search
     * @return Usuario|null
     */
    public static function getUserByName(string $username): ?Usuario
    {
        // Get DB
        // Run query
        // Get row
        // Parse User

        $db = AppDatabase::getInstance()->getConnection();

        $statement = $db->prepare("SELECT * FROM Usuarios WHERE Username = :username");
        $statement->bindValue(':username', $username);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $userModel = new Usuario();

            $userModel->Username = $user['Username'];
            $userModel->Password = $user['Password'];
            $userModel->Id_Persona = $user['Id_Persona'];
            $userModel->Id_tipo_usuario = $user['Id_tipo_usuario'];

            return $userModel;
        }

        return null;
    }

    public static function Exists(string $userName): bool
    {
        // Get DB
        // Run query
        // Check row exists

        $db = AppDatabase::getInstance()->getConnection();

        $query = $db->prepare(
            'SELECT * FROM Usuarios WHERE Username = :Username'
        );
        $query->execute([
            'Username' => $userName,
        ]);

        $userExists = $query->fetch(PDO::FETCH_ASSOC);
        return $userExists !== false;
    }


    /**
     * @return Usuario|null
     */
    public function Save(): ?Usuario
    {
        // Get DB
        // Run query
        // Get last Insert
        // Parse User id

        // TODO revisar si usuario es unico
        // TODO utilizar id persona.
        // TODO utilizar id tipo usuario

        $db = AppDatabase::getInstance()->getConnection();

        $statement = $db->prepare(
            'INSERT INTO Usuarios (Username, Password, Id_Persona, Id_tipo_usuario)' .
            'VALUES (:Username, :Password, :Id_Persona, :Id_tipo_usuario)'
        );
        $statement->execute([
            'Username' => $this->Username,
            'Password' => $this->Password,
            'Id_Persona' => 1,
            'Id_tipo_usuario' => 1,
        ]);

        $this->Id_usuario = $db->lastInsertId();
        return $this;
    }

    // TODO
    public function Update()
    {

    }
}