<?php

include_once 'config/config.php';
include_once APPROOT . 'app/controllers/RegisterController.php';
include_once APPROOT . 'app/controllers/LoginController.php';
include_once APPROOT . 'app/Router.php';

use app\controllers\LoginController;
use app\controllers\RegisterController;
use app\Router;

Router::get("/login", function() {
    $controller = new LoginController();
    $controller->showLogin();
});

Router::post("/login", function() {
    $controller = new LoginController();
    $controller->handleLoginSubmission();
});

Router::get("/registro", function() {
    $controller = new RegisterController();
    $controller->showRegistro();
});

Router::post("/registro", function() {
    $controller = new RegisterController();
    $controller->handleRegistroSubmission();
});

Router::resolve();