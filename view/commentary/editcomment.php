<?php
if ($app->session->get('email') == $email) {
     $form = "<form action='editcommentprocess' method='post'>
         <textarea name='comment' rows='20' cols='200'> $comment </textarea>
         <input type='submit' name='editcommentbtn' value='Redigera'  />
         <input type='submit' name='deletecommentbtn' value='Ta bort kommentar'  />
     </form>";
} else {
    $form = "Inte din kommentar att redigera";
}
echo $form;
