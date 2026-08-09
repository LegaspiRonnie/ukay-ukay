<?php

$host = 'localhost';
$dbName = 'ukay_ukay';
$dbUser = 'root';
$dbPassword = '';

$dsn = "mysql:host=$host;dbname=$dbName;charset=utf8mb4";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $db = new PDO($dsn, $dbUser, $dbPassword, $options);
} catch (PDOException $e) {
    exit('Database connection failed. ' . $e->getMessage());
}