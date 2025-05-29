<?php
// includes/auth_functions.php
require_once 'db.php';
require_once 'security.php';

function isLoggedIn()
{
    return isset($_SESSION['user_id']) && $_SESSION['logged_in'] === true;
}

function redirectIfNotLoggedIn()
{
    if (!isLoggedIn()) {
        header("Location: login.php");
        exit();
    }
}

function loginUser($userId, $username)
{
    session_regenerate_id(true);
    $_SESSION['user_id'] = $userId;
    $_SESSION['username'] = $username;
    $_SESSION['logged_in'] = true;
}

function logoutUser()
{
    $_SESSION = array();
    session_destroy();
}

function validatePassword($password)
{
    return strlen($password) >= 8;
}
