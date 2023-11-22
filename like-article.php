<?php
$stmt = $pdo->prepare("SELECT * FROM articles ORDER BY created_at DESC");
$stmt->execute();
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($articles as $article) {
    $articleId = $article['id'];
    $articleTitle = $article['title'];

    $stmt = $pdo->prepare("SELECT * FROM likes WHERE user_id = ? AND article_id = ?");
    $stmt->execute([$userId, $articleId]);
    $like = $stmt->fetch();

    if ($like) {
        echo '<form action="unlike-article.php" method="post">
            <input type="hidden" name="article_id" value="' . $articleId . '">
            <input type="submit" value="Unlike">
        </form>';
    } else {
        echo '<form action="like-article.php" method="post">
            <input type="hidden" name="article_id" value="' . $articleId . '">
            <input type="submit" value="Like">
        </form>';
    }
}