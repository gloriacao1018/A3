<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dsn = 'mysql:host=localhost;dbname=IMMNEWSNETWORK;charset=utf8mb4';
$dbusername = 'root';
$dbpassword = '';

$pdo = new PDO($dsn, $dbusername, $dbpassword);

$stmt = $pdo->prepare("SELECT * FROM about WHERE id = 1");
$stmt->execute();
$about = $stmt->fetch();

if (!$about) {
    exit('No about page content found.');
}
?>

<h2>About</h2>
<p><?php echo $about['content']; ?></p>
<a href="edit-about.php">Edit About</a>