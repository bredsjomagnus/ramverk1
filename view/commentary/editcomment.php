<?php
if ($app->session->get('email') == $email) {
     $form = "<form action='#' method='post'>
         <textarea name='comment' rows='20' cols='200'> $comment </textarea>
     </form>";
} else {
    $form = "Inte din kommentar att redigera";
}
echo $form;
