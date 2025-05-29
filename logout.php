<?php
// logout.php
require_once 'includes/auth_functions.php';
logoutUser();
header("Location: login.php?logout=success");
exit;
