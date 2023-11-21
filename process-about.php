<?php
$dsn = 'mysql:host=localhost;dbname=IMMNEWSNETWORK;charset=utf8mb4';
$dbusername = 'root';
$dbpassword = '';

$pdo = new PDO($dsn, $dbusername, $dbpassword);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['about'])) {
        exit('No About text was provided.');
    }

    $stmt = $pdo->prepare("UPDATE about SET content = :content WHERE id = 1");
    $stmt->execute(['content' => $_POST['about']]);

    header('Location: edit-about.php?updated=true');
    exit;
} else {
    exit('Invalid request.');
}