<?php

namespace app;

use app\models\Usuario;

class Auth
{

    // Add a new session
    private static function addSession(string $userName): void
    {
        $_SESSION["auth"] = $userName;
    }

    // Removes a sessinion by its code.
    private static function removeSession(): void
    {
        if (!empty($_SESSION["auth"])) {
            unset($_SESSION["auth"]);
        }
    }

    public static function check(): bool
    {
        return (!empty($_SESSION["auth"]));
    }

    /** TODO
     *  Get the user by its session ID
     * @return Usuario|null
     */
    public static function user(): ?Usuario
    {
        // Get user

        return null;
    }

    /**
     *  Checks a user's password
     * @param string $input
     * @param string $password
     * @return bool
     */
    public static function checkPassword(string $input, string $password): bool
    {
        // Validate password against hash

        return password_verify($input, $password);
    }

    /**
     *  Authenticates the user for login
     * @param string $username
     * @param string $password
     * @param bool $remember
     * @return bool
     */
    public static function login(string $username, string $password, bool $remember): bool
    {
        // Get User
        // check password
        // process login

        $user = Usuario::getUserByName($username);

        if(empty($user->Password)) return false;
        if (!self::checkPassword($password, $user->Password)) return false;

        self::processLogin($user->Username, $remember);
        return true;
    }

    /**
     *  Process the session login of a user.
     * @param string $username
     * @param bool $remember TODO
     * @return void
     */
    public static function processLogin(string $username, bool $remember): void
    {
        // Create session
        // store session cookie on client


        self::addSession($username);

        /*if ($remember) {
            $lifetime = 60 * 60 * 24 * 7; // 1 week
            setcookie(session_name(), session_id(), time() + $lifetime);
        }*/
    }

    /** TODO
     *  Removes the session of user.
     * @return void
     */
    public static function logout(): void
    {
        // Check client has auth cookie
        // Remove session map (when applicable)
        // Remove session

        if(self::isGuest()) return;
        self::removeSession();

        session_unset();
        session_destroy();

        Router::redirect("/movies", null);
    }

    /** TODO
     *  Creates a new user. Logs user in.
     * @param string $firstName
     * @param string $lastName
     * @param string $username
     * @param string $password
     * @return bool
     */
    public static function register(string $firstName, string $lastName, string $username, string $password): bool
    {
        // Create user model
        // Store user model
        // login user
        // Redirect to home

        return false;
    }

    /**
     * Checks if user is guest.
     * @return bool
     */
    public static function isGuest(): bool
    {
        return !self::check();
    }
}