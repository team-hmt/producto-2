<?php

include_once 'config/config.php';
include_once APPROOT . 'app/controllers/Auth.php';
include_once APPROOT . 'app/Router.php';

use app\controllers\Auth;
use app\Router;

Router::get("/login", function() {
    $authController = new Auth();
    $authController->showLogin();
});

Router::post("/login", function() {
    $authController = new Auth();
    $authController->handleLoginSubmission();
});

Router::get("/registro", function() {
    $authController = new Auth();
    $authController->showRegistro();
});

Router::post("/registro", function() {
    $authController = new Auth();
    $authController->handleRegistroSubmission();
});

Router::resolve();