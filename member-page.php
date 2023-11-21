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

$stmt = $pdo->prepare("SELECT content FROM about WHERE id = 1");
$stmt->execute();
$about = $stmt->fetchColumn();
$stmt = $pdo->prepare("
    SELECT articles.*, COUNT(likes.id) AS likes
    FROM articles
    LEFT JOIN likes ON articles.id = likes.article_id
    GROUP BY articles.id
");
$stmt->execute();
$articles = $stmt->fetchAll();

?>


<h1>Welcome to IMMNEWSNETWORK!</h1>
<h2>About</h2>
<p><?php echo $about; ?></p>

<section class="">
    <?php foreach ($articles as $article): ?>
        <article> 
        <p>Likes: <?php echo $article['likes']; ?></p>
        <form action="process-like.php" method="post">
    <input type="hidden" name="article_id" value="<?php echo $article['id']; ?>">
    <?php if (isset($article['liked']) && $article['liked'] > 0): ?>
        <input type="hidden" name="action" value="unlike">
        <input type="submit" value="Unlike">
    <?php else: ?>
        <input type="hidden" name="action" value="like">
        <input type="submit" value="Like">
    <?php endif; ?>
</form>
            <?php if ($article['featured'] == 1): ?>
                <h2>Featured Article</h2>
            <?php endif; ?>
            <h4><?php echo $article['title']; ?></h4>
            <p>Author: <?php echo $article['author']; ?></p>
            <p><?php echo $article['content']; ?></p>
            <a href="<?php echo $article['link']; ?>" target="_blank">Read more</a>
            </article>
    <?php endforeach; ?>
</section>

    <div class="contact-info">
        <h3>Contact Information</h3>
        <address>
            <p>Email: gloriacao@gmail.com</p>
            <p>Phone: 058-646-3607</p>
        </address>
    </div>

    <section id="contact-form">
        <form action="process-contact.php" method="POST">
            <h3>Contact Us!</h3>
            <ul>
                <li>First Name: <input type="text" name="fName"></li>
                <li>Last Name: <input type="text" name="lName"></li>
                <li>Email: <input type="text" name="email"></li>
                <li>Phone Number: <input type="text" name="phone_num"></li>
                <li>Message: <textarea name="message"></textarea></li>
                <li><input type="submit" value="Submit"></li>
            </ul>
        </form>
    </section>

    <footer>
        <p>About cookie usage. <span id="cookie-consent-text"></span></p>
        <button id="accept-cookies-button" onclick="acceptCookies()">Accept Cookies</button>
        <button id="revoke-cookies-button" onclick="revokeCookies()">Revoke</button>
        <a href="#" id="reaccept-cookies-link" style="display: none;" onclick="reacceptCookies()">Reaccept Cookies</a>
    </footer>

