<?php
$dsn = 'mysql:host=localhost;dbname=IMMNEWSNETWORK;charset=utf8mb4';
$dbusername = 'root';
$dbpassword = '';

$pdo = new PDO($dsn, $dbusername, $dbpassword);

$stmt = $pdo->prepare("SELECT content FROM about WHERE id = 1");
$stmt->execute();
$about = $stmt->fetchColumn();
if (isset($_GET['updated']) && $_GET['updated'] === 'true') {
    echo '<p>Successfully updated!</p>';
    echo '<a href="edit-articles.php">Go Back</a>';
}
?>

<h2>Edit About Section</h2>
<form action="process-about.php" method="post">
    <textarea name="about" rows="10" cols="30">
        <?php echo $about; ?>
    </textarea>
    <input type="submit" value="Update About">
</form>