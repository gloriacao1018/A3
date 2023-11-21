<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dsn = 'mysql:host=localhost;dbname=IMMNEWSNETWORK;charset=utf8mb4';
$dbusername = 'root';
$dbpassword = '';

$pdo = new PDO($dsn, $dbusername, $dbpassword);

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['id'])) {
        exit('No ID was provided.');
    }

    $stmt = $pdo->prepare("UPDATE articles SET title = :title, author = :author, content = :content, link = :link WHERE id = :id");
    $stmt->execute([
        'title' => $_POST['title'],
        'author' => $_POST['author'],
        'content' => $_POST['content'],
        'link' => $_POST['link'],
        'id' => $_POST['id']
    ]);

    $message = 'Article updated successfully.';
    
    // Fetch the article again after it's updated
    $stmt = $pdo->prepare("SELECT * FROM articles WHERE id = :id");
    $stmt->execute(['id' => $_POST['id']]);
    $article = $stmt->fetch();
} else {
    if (!isset($_GET['id'])) {
        exit('No ID was provided.');
    }

    $stmt = $pdo->prepare("SELECT * FROM articles WHERE id = :id");
    $stmt->execute(['id' => $_GET['id']]);
    $article = $stmt->fetch();

    if (!$article) {
        exit('No article found with that ID.');
    }
}
?>

<form action="update-article.php" method="post">
    <input type="hidden" name="id" value="<?php echo $article['id']; ?>">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" value="<?php echo $article['title']; ?>">
    <label for="author">Author</label>
    <input type="text" name="author" id="author" value="<?php echo $article['author']; ?>">
    <label for="content">Content</label>
    <textarea name="content" id="content"><?php echo $article['content']; ?></textarea>
    <label for="link">Link</label>
    <input type="text" name="link" id="link" value="<?php echo $article['link']; ?>">
    <input type="submit" value="Update Article">
</form>


<?php if ($message): ?>
    <p><?php echo $message; ?></p>
    <a href="edit-articles.php">Go back</a>
<?php endif; ?>