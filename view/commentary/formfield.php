<?php
$addcommenturl = $app->url->create("addcomment");
$formode = "disabled";
if ($app->session->has('user')) {
    $formode = "";
}
?>
<form action=<?= $addcommenturl ?> method="POST">
    <input type="text" name="comment" value="" placeholder="Skriv kommentar här!" <?= $formode ?>>
    <input type="hidden" name="username" value=<?= $app->session->get('user', "nooot") ?>>
    <input type="hidden" name="email" value=<?= $app->session->get('email', "nooot") ?>>
    <input type="submit" name="commentbtn" value="Lägg kommentar" <?= $formode ?>>
    <input type="submit" name="resetdbbtn" value="Rensa databas på kommentarer" <?= $formode ?>>
</form>
