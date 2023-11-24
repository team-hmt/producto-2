<?php

namespace app\traits;

use app\models\Usuario;

trait Authentication
{
    private static array $auth_session_map = [];

    // Add a new session to a user with True on success
    private static function addSession(string $userName): bool
    {
        $session = uniqid('session_');

        if (!array_key_exists($session, self::$auth_session_map)) {
            self::$auth_session_map[$session] = $userName;
            return true;
        }

        return false;
    }

    // Removes a sessinion by its code.
    private static function removeSession(string $session): void
    {
        if (array_key_exists($session, self::$auth_session_map)) {
            unset(self::$auth_session_map[$session]);
        }
    }

    /** TODO
     *  Get the user by its session ID
     * @return Usuario|null
     */
    protected static function user(): ?Usuario
    {
        // check is authenticated
        // Get user

        return null;
    }

    /** TODO
     *  Checks a user's password
     * @param string $username
     * @param string $password
     * @return bool
     */
    protected static function checkPassword(string $username, string $password): bool
    {
        // Get user from DB
        // Validate password against hash

        return false;
    }

    /** TODO
     *  Authenticates the user for login
     * @param string $username
     * @param string $password
     * @param bool $remember
     * @return bool
     */
    protected static function login(string $username, string $password, bool $remember): bool
    {
        // check password
        // process login

        return false;
    }

    /** TODO
     *  Process the session login of a user.
     * @param string $username
     * @param bool $remember
     * @return void
     */
    protected static function processLogin(string $username, bool $remember): void
    {
        // Validate credentials
        // Create session
        // store session cookie on client
        // Redirect to home
    }

    /** TODO
     *  Removes the session of user.
     * @return void
     */
    protected static function logout(): void
    {
        // Check client has auth cookie
        // Remove session cookie
        // Remove session from server (when applicable)
    }

    /** TODO
     *  Creates a new user. Logs user in.
     * @param string $username
     * @param string $password
     * @return bool
     */
    protected static function register(string $username, string $password): bool
    {
        // Create user model
        // Store user model
        // login user
        // Redirect to home

        return false;
    }

    /** TODO
     * Checks if user is authenticated
     * @return bool
     */
    protected static function isAuthenticated(): bool
    {
        // Check session header
        // check session exists

        return false;
    }

    /**
     * Checks if user is guest.
     * @return bool
     */
    protected static function isGuest(): bool
    {
        return !self::isAuthenticated();
    }
}