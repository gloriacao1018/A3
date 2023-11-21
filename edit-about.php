<?php
?>
<h2>Edit About Section</h2>
<form action="process-about.php" method="post">
    <textarea name="about" rows="10" cols="30">
        <?php echo $about; ?>
    </textarea>
    <input type="submit" value="Update About">
</form>