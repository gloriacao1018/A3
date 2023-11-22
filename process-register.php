<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$email = $_POST['email'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$dsn = 'mysql:host=localhost;dbname=IMMNEWSNETWORK;charset=utf8mb4';
$dbusername = 'root';
$dbpassword = '';

$pdo = new PDO($dsn, $dbusername, $dbpassword);

$stmt = $pdo->prepare("SELECT * FROM `users` WHERE `username` = ?");
$stmt->execute([$username]);
$user = $stmt->fetch();

if ($user) {
    echo 'Username already taken';
} else {
    $stmt = $pdo->prepare("INSERT INTO `users` (`email`, `username`, `password`, `role`) VALUES (?, ?, ?, 'member')");
    $stmt->execute([$email, $username, $password]);
    header('Location: register-success.php');
}
?>