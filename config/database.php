<?php
// config/database.php

$host = 'localhost'; // Database host
$dbname = 'Crowdsourcing'; // Database name
$username = 'root'; // Database username (default for XAMPP is 'root')
$password = ''; // Database password (default for XAMPP is an empty string)

// Set DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

try {
    // Create a PDO instance and connect to the database
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connected to the database successfully!';
} catch (PDOException $e) {
    // Handle connection failure
    echo 'Connection failed: ' . $e->getMessage();
}
?>
