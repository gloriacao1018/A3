<?php
$dsn = 'mysql:host=localhost;dbname=IMMNEWSNETWORK;charset=utf8mb4';
$dbusername = 'root';
$dbpassword = '';

$pdo = new PDO($dsn, $dbusername, $dbpassword);

$articleId = $_POST['article_id'];
$userId = $_SESSION['user_id']; 

$stmt = $pdo->prepare("INSERT INTO likes (user_id, article_id) VALUES (?, ?)");
$stmt->execute([$userId, $articleId]);

header('Location: member-page.php');