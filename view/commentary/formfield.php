<?php
$addcommenturl = $app->url->create("addcomment");
?>
<form action=<?= $addcommenturl ?> method="POST">
    <input type="text" name="comment" value="" placeholder="Skriv kommentar här!">
    <input type="submit" name="commentbtn" value="Lägg kommentar">
    <input type="submit" name="resetdbbtn" value="Rensa databas på kommentarer">
</form>
