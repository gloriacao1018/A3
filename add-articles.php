<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dsn = 'mysql:host=localhost;dbname=IMMNEWSNETWORK;charset=utf8mb4';
$dbusername = 'root';
$dbpassword = '';

$pdo = new PDO($dsn, $dbusername, $dbpassword);

$title = $_POST['title'];
$author = $_POST['author'];
$content = $_POST['content'];
$link = $_POST['link'];

$stmt = $pdo->prepare("INSERT INTO `articles` (`id`, `title`, `author`, `content`, `link`) VALUES (NULL, ?, ?, ?, ?)");
$stmt->execute([$title, $author, $content, $link]);

?>
<h1>Article Added</h1>
<a href="edit-articles.php">Go Back</a>