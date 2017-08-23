<?php
$addcommenturl = $app->url->create("addcomment");
?>
<form action=<?= $addcommenturl ?> method="GET">
    <input type="text" name="kommentar" value="" placeholder="Skriv kommentar här!">
    <input type="submit" name="kommentarbtn" value="Lägg kommentar">
</form>
