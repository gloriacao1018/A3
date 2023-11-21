<?php

$stmt = $pdo->prepare("SELECT content FROM about WHERE id = 1");
$stmt->execute();
$about = $stmt->fetchColumn();

?>


<h1>Welcome to IMMNEWSNETWORK!</h1>
<h2>About</h2>
<p><?php echo $about; ?></p>
<form action="like-article.php" method="post">
    <input type="hidden" name="article_id" value="' . $article['id'] . '">
    <input type="submit" value="Like">
    </form>
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

