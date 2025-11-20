<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');           // Change this to your MySQL username
define('DB_PASS', 'CZ@Portal!07wX8$2Cw9I');               // Change this to your MySQL password
define('DB_NAME', 'sir_updates');

// Create connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set charset to utf8mb4 for Malayalam characters
$conn->set_charset("utf8mb4");
?>
