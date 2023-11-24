<?php

include_once 'config/config.php';
include_once APPROOT . 'app/controllers/Auth.php';

use app\controllers\Auth;

$auth = new Auth();

$_POST['username'] = 'user_test_1';
$_POST['password'] = 'password_test_1';
$_POST['confirm_password'] = 'password_test_1';

// Mock register
$auth->registro_post();

// Mock login
$auth->login_post();