<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'includes/db.php';

try {
    $stmt = $pdo->query("SELECT 1");
    echo "Database connection works!";

    // Test table exists
    $stmt = $pdo->query("SELECT * FROM users LIMIT 1");
    echo "Users table exists!";
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
