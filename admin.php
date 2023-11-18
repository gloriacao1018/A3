<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header('Location: login.php');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['action'] == 'add') {
        $stmt = $pdo->prepare('INSERT INTO articles (title, content) VALUES (?, ?)');
        $stmt->execute([$_POST['title'], $_POST['content']]);
    } elseif ($_POST['action'] == 'edit') {
        $stmt = $pdo->prepare('UPDATE articles SET title = ?, content = ? WHERE id = ?');
        $stmt->execute([$_POST['title'], $_POST['content'], $_POST['id']]);
    } elseif ($_POST['action'] == 'delete') {
        $stmt = $pdo->prepare('DELETE FROM articles WHERE id = ?');
        $stmt->execute([$_POST['id']]);
    }
}

$stmt = $pdo->prepare('SELECT * FROM articles');
$stmt->execute();
$articles = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html>
<body>
    <form action="" method="post">
        <input type="hidden" name="action" value="add">
        Title: <input type="text" name="title"><br>
        Content: <textarea name="content"></textarea><br>
        <input type="submit" value="Add Article">
    </form>

    <?php foreach ($articles as $article): ?>
        <h2><?php echo $article['title']; ?></h2>
        <p><?php echo $article['content']; ?></p>
        <form action="" method="post">
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="id" value="<?php echo $article['id']; ?>">
            Title: <input type="text" name="title" value="<?php echo $article['title']; ?>"><br>
            Content: <textarea name="content"><?php echo $article['content']; ?></textarea><br>
            <input type="submit" value="Edit Article">
        </form>
        <form action="" method="post">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="id" value="<?php echo $article['id']; ?>">
            <input type="submit" value="Delete Article">
        </form>
    <?php endforeach; ?>
</body>
</html>