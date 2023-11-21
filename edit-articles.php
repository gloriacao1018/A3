<?php
$dsn = 'mysql:host=localhost;dbname=IMMNEWSNETWORK;charset=utf8mb4';
$dbusername = 'root';
$dbpassword = '';

$pdo = new PDO($dsn, $dbusername, $dbpassword);

$stmt = $pdo->query("SELECT * FROM articles");
$articles = $stmt->fetchAll();
?>

<h1>Welcome to IMMNEWSNETWORK!</h1>

<section class="featured-article">
        <h2>Featured Article</h2>
        <article>
            <h4>Narrative in Linear Interactive Media</h4>
            <p>Author: Myk Eff</p>
            <p>"Linear narrative refers to forms of storytelling in which the events of the story are presented in a cause-and-effect sequence that the audience experiences in a predetermined order, as fixed by the medium. Interactive narrative, on the other hand, refers to forms of storytelling in which the audience has some degree of control over the order in which events are experienced, as they are able to make choices that affect the direction, and outcome, of the story."</p>
            <a href="https://www.udemy.com/course/linear-and-interactive-narrative/" target="_blank">Read more</a>
        </article>
        
    </section>

    <section class="industry">
    <h2>Industry</h2>
        <article>
        <h4>Digital I/O with Arduino Boards</h4>
            <p>Author: Ashwan Kadam</p>
            <p>"An LED diffuser provides illumination with any color on the color wheel by using a combination of red, blue, and green light. "</p>
            <a href="https://medium.com/@iamcharlenelu/lab-2-digital-i-o-with-arduino-boards-2b6566363c8a" target="_blank">Read more</a>

        </article>
        <article>
        
            <h4>Technicolor Thoughts and Virtual Visions</h4>
            <p>Author: Laurien Michiels</p>
            <p>"After an exciting exit from the Schanzenstraße in Cologne, we made our way to the Schanzenstraße in Düsseldorf. It was almost like we never left the street!"</p>
            <a href="https://www.bloomberg.com/press-releases/2021-05-19/technicolor-unveils-new-creative-organization-and-vision-to-go-beyond-imagination" target="_blank">Read more</a>
        </article>    
</section>

<section class="technical">
    <h2>Technical</h2>
        <article>
        <h4>Shifting perspective: Inception VR makes user question their reality</h4>
            <p>Author: Riane Cox</p>
            <p>“Inception VR” was inspired by the everyday worker or student who is in need of an escape from monotonous reality. How can we give them a shift in reality that may leave them with new perspectives?</p>
            <a href="">Read more</a>
        </article>

        <article>
        <h4>Recalling places of mental and physical escape using AR</h4>
            <p>Author: Alexandra Tamayo</p>
            <p>Our relationship with movement and spaces changed over the course of the Covid-19 pandemic in ways we are still grasping with. The pandemic not only halted international travel, but confined most people to their homes, leaving small opportunities for them to change scenery and to move even within their own cities. Quotidian places became constricting and the inability to move a daunting thought for many. Natural environments were some of the only available spaces for movement and exploration. In this time, digital spaces became options for change, travel, movement and connection to the world. But were they enough?</p>
            <a href="">Read more</a>
        </article>
        
</section>

<!-- <section class="career">
    <h2>Career</h2>
        <article>
        <h4>MA Digital Narratives is now open for applications!</h4>
            <p>Author: Ashwan Kadam</p>
            <p>The Master's Programme Digital Narratives at the Internationale Filmschule Köln is now open for your applications! The next class is scheduled to begin in the winter semester of 2024–25.</p>
            <a href="" target="_blank">Read more</a>
        </article>

        <article>
        <h4>Digital Vaginas, Magazines & Echoes</h4>
            <p>Author: Gwamaka Mwabuka</p>
            <p>"After an exciting exit from the Schanzenstraße in Cologne, we made our way to the Schanzenstraße in Düsseldorf. It was almost like we never left the street!"</p>
            <a href="" target="_blank">Read more</a>
        </article>

</section> -->


<section class="career">
    <h2>Career</h2>
    <?php foreach ($articles as $article): ?>
        <article>
            <h4><?php echo $article['title']; ?></h4>
            <p>Author: <?php echo $article['author']; ?></p>
            <p><?php echo $article['content']; ?></p>
            <a href="<?php echo $article['link']; ?>" target="_blank">Read more</a>
            <a href="edit-article.php?id=<?php echo $article['id']; ?>">Edit</a>
            <a href="delete-article.php?id=<?php echo $article['id']; ?>">Delete</a>
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