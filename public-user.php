<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dsn = 'mysql:host=localhost;dbname=IMMNEWSNETWORK;charset=utf8mb4';
$dbusername = 'root';
$dbpassword = '';

$pdo = new PDO($dsn, $dbusername, $dbpassword);

$stmt = $pdo->prepare("SELECT * FROM articles");
$stmt->execute();
$articles = $stmt->fetchAll();
?>
<h1>Welcome to IMMNEWSNETWORK!</h1>
<div>
<a href="login.php">Sign In</a>
</div>
<div>
<a href="register.php">Sign Up</a>
</div>
<h2>About</h2>
<p>IMMNEWSNETWORK is a news website that provides the latest news on the entertainment industry.</p>
<h2>Articles</h2>
<section class="">
    <?php foreach ($articles as $article): ?>
        <article>
            <h4><?php echo $article['title']; ?></h4>
            <p>Author: <?php echo $article['author']; ?></p>
            <p><?php echo $article['content']; ?></p>
            <a href="<?php echo $article['link']; ?>" target="_blank">Read more</a>
        </article>
    <?php endforeach; ?>
</section>