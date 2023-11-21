<?php
$dsn = 'mysql:host=localhost;dbname=IMMNEWSNETWORK;charset=utf8mb4';
$dbusername = 'root';
$dbpassword = '';

$pdo = new PDO($dsn, $dbusername, $dbpassword);

$stmt = $pdo->query("SELECT * FROM articles ");
$articles = $stmt->fetchAll();
?>

<h1>Welcome to IMMNEWSNETWORK!</h1>
<h2>About</h2>
<p id="about">IMMNEWSNETWORK is a news website that provides the latest news on the entertainment industry.</p>
<a href="edit-about.php">Edit About</a>

<section class="">
    <?php foreach ($articles as $article): ?>
        <article>
            <?php if ($article['featured'] == 1): ?>
                <h2>Featured Article</h2>
            <?php endif; ?>
            <h4><?php echo $article['title']; ?></h4>
            <p>Author: <?php echo $article['author']; ?></p>
            <p><?php echo $article['content']; ?></p>
            <a href="<?php echo $article['link']; ?>" target="_blank">Read more</a>
            <a href="update-article.php?id=<?php echo $article['id']; ?>">Edit</a>
            <a href="delete-article.php?id=<?php echo $article['id']; ?>">Delete</a>
            <a href="set-featured-article.php?id=<?php echo $article['id']; ?>">Set as Featured</a>
        </article>
    <?php endforeach; ?>
</section>

<form action="add-articles.php" method="post">
<h1>Add Article</h1>
<div>
    <label for="title">Title:</label>
    <input type="text" id="title" name="title">
</div>
<div>
    <label for="author">Author:</label>
    <input type="text" id="author" name="author">
</div>
<div>
    <label for="content">Content:</label>
    <textarea id="content" name="content"></textarea>
</div>
<div>
    <label for="link">Link:</label>
    <input type="text" id="link" name="link">
</div>
<div>
    <input type="submit" value="Add Article">
</div>
</form>

<a href="view-contact-submissions.php">View Contact Form Submissions</a>