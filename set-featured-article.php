<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dsn = 'mysql:host=localhost;dbname=IMMNEWSNETWORK;charset=utf8mb4';
$dbusername = 'root';
$dbpassword = '';

$pdo = new PDO($dsn, $dbusername, $dbpassword);

$stmt = $pdo->prepare("UPDATE articles SET featured = 0");
$stmt->execute();

$stmt = $pdo->prepare("UPDATE articles SET featured = 1 WHERE id = :id");
$stmt->execute(['id' => $_GET['id']]);

echo "Featured article set successfully.";
?>
<a href="edit-articles.php">Go Back</a>