<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dsn = 'mysql:host=localhost;dbname=IMMNEWSNETWORK;charset=utf8mb4';
$dbusername = 'root';
$dbpassword = '';

$pdo = new PDO($dsn, $dbusername, $dbpassword);

// Set the `featured` column of all articles to `0`
$stmt = $pdo->prepare("UPDATE articles SET featured = 0");
$stmt->execute();

// Set the `featured` column of the article with the provided ID to `1`
$stmt = $pdo->prepare("UPDATE articles SET featured = 1 WHERE id = :id");
$stmt->execute(['id' => $_GET['id']]);

echo "Featured article set successfully.";
?>