<?php

namespace Maaa16\Commentary;

use \Anax\Common\AppInjectableInterface;
use \Anax\Common\AppInjectableTrait;

/**
 * REM Server.
 */
class CommAssembler implements AppInjectableInterface
{
    use AppInjectableTrait;

    /**
    * Get comment from session
    *
    * @param array $comments restable from databas comments
    */
    public function assemble($app, $comments)
    {
        $table = "";
        $table = "<table class='commenttable'>";
        $table .=   "<thead>
                        <tr>
                            <th class='avatarcolumn'>
                            </th>
                        </tr>
                    </thead>
                    <tbody>";
        foreach ($comments as $comment) {
            $default = "http://i.imgur.com/CrOKsOd.png"; // Optional
            $gravatar = new \Maaa16\Gravatar\Gravatar($comment->email, $default);
            $gravatar->size = 50;
            $gravatar->rating = "G";
            $gravatar->border = "FF0000";
            $filteredcomment = $app->textfilter->markdown($comment->comm);

            $commentlikes = explode(",", $comment->likes);

            $likeanswereditline = "";
            if ($app->session->get('email') == $comment->email) {
                $editcommenturl = $app->url->create("editcomment") ."?id=". $comment->id;
                $likeanswereditline = "<a href='".$editcommenturl."'>redigera</a>";
            } else if ($app->session->has('user')) {
                $addlikeprocessurl = $app->url->create("addlikeprocess")."?userid=".$app->session->get('userid')."&commentid=".$comment->id;
                if (!in_array($app->session->get('userid'), $commentlikes)) {
                    $likeanswereditline = "<a href='".$addlikeprocessurl."'>Gilla</a>&nbsp&nbsp&nbsp";
                }
                $likeanswereditline .= "<a href='#'>Svara</a>";
            }
            $edited = "";
            if ($comment->edited !== null) {
                $edited = "<span class='text-muted'>REDIGERAD: " . $comment->edited."</span>";
                $likeanswereditline .= "&nbsp&nbsp&nbsp".$edited;
            }



            // <td>".$gravatar->toHTML()."</td>
            $table .=   "<tr>
                            <td valign=top>".$gravatar->toHTML()."</td>
                            <td>".$filteredcomment."</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>".$likeanswereditline."</td>
                        </tr>
                        <tr>
                            <td class='commentaryunderline'></td>
                            <td class='text-muted commentaryunderline'><i>".$comment->created."&nbsp&nbsp&nbsp".$comment->username.", ".$comment->email."</i></td>
                        </tr>";
        }
        $table .=   "</tbody>
                    </table>";
        return $table;
    }
}
