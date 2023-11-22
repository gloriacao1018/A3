<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dsn = 'mysql:host=localhost;dbname=IMMNEWSNETWORK;charset=utf8mb4';
$dbusername = 'root';
$dbpassword = '';

$pdo = new PDO($dsn, $dbusername, $dbpassword);

$stmt = $pdo->query("SELECT * FROM contactform");
$contactform = $stmt->fetchAll();
?>

<h1>Contact Submissions</h1>

<section>
    <?php foreach ($contactform as $submission): ?>
        <article>
            <h4>From: <?php echo $submission['name']; ?></h4>
            <p>Email: <?php echo $submission['email']; ?></p>
            <p>Message: <?php echo $submission['message']; ?></p>
        </article>
    <?php endforeach; ?>
</section>

<a href="edit-articles.php">Go Back</a>