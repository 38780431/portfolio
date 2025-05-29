<?php
// check_auth.php
require_once 'includes/security.php';
require_once 'includes/auth_functions.php';

header('Content-Type: application/json');
echo json_encode(['authenticated' => isLoggedIn()]);
