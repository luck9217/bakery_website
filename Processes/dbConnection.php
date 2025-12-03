<?php
/**
 * Database Connection for Luca's Loaves
 * Connects to MySQL database using mysqli
 */

// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'admin');
define('DB_NAME', 'lucas_loaves');

// Create connection
$dbConnection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if (!$dbConnection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set charset to utf8mb4
mysqli_set_charset($dbConnection, 'utf8mb4');

?>
