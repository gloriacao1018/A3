<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dsn = 'mysql:host=localhost;dbname=IMMNEWSNETWORK;charset=utf8mb4';
$dbusername = 'root';
$dbpassword = '';

$pdo = new PDO($dsn, $dbusername, $dbpassword);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['article_id']) && isset($_POST['action'])) {
        $article_id = $_POST['article_id'];
        $action = $_POST['action'];

        $user_id = 1; 

        $check_like_sql = "SELECT * FROM likes WHERE user_id = $user_id AND article_id = $article_id";
        $check_like_result = $pdo->query($check_like_sql);

        if ($check_like_result->rowCount() === 0) {
            $insert_like_sql = "INSERT INTO likes (user_id, article_id) VALUES ($user_id, $article_id)";
            $pdo->query($insert_like_sql);
        } else {
            $delete_like_sql = "DELETE FROM likes WHERE user_id = $user_id AND article_id = $article_id";
            $pdo->query($delete_like_sql);
        }
        header("Location: member-page.php");
        exit();
    }
}
?>
