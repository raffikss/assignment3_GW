<?php
// DB config 
$host = 'localhost';
$dbname = 'webdev_project';
$username = 'root'; 
$password = '';

try {
    // new PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // services table
    $sql = "CREATE TABLE IF NOT EXISTS services (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        description TEXT NOT NULL,
        image VARCHAR(255) NOT NULL
    )";
    $pdo->exec($sql);
    echo "Table 'services' created successfully.<br>";

    // users table
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL
    )";
    $pdo->exec($sql);
    echo "Table 'users' created successfully.<br>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// close connection
$pdo = null;
?>