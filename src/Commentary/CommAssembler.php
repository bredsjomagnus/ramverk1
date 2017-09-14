<?php

namespace Maaa16\Commentary;

use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;

/**
 * REM Server.
 */
class CommAssembler implements InjectionAwareInterface
{
    use InjectionAwareTrait;

    /**
    * Get comment from session
    *
    * @param array $comments restable from databas comments
    */
    public function assemble($comments)
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
            $filteredcomment = $this->di->get("textfilter")->markdown($comment->comm);

            $commentlikes = explode(",", $comment->likes);

            $likeanswereditline = "";
            if ($this->di->get("session")->get('email') == $comment->email) {
                $editcommenturl = $this->di->get("url")->create("editcomment") ."?id=". $comment->id;
                $likeanswereditline = "<a href='".$editcommenturl."'>redigera</a>";
            } else if ($this->di->get("session")->has('user')) {
                $addlikeprocessurl = $this->di->get("url")->create("addlikeprocess")."?userid=".$this->di->get("session")->get('userid')."&commentid=".$comment->id;
                if (!in_array($this->di->get("session")->get('userid'), $commentlikes)) {
                    $likeanswereditline = "<a href='".$addlikeprocessurl."'>Gilla</a>&nbsp&nbsp&nbsp";
                } else {
                    $likeanswereditline = "<span>Gilla</span>&nbsp&nbsp&nbsp";
                }
                // $likeanswereditline .= "<a href='#'>Svara</a>";
            }

            $edited = "";
            if ($comment->edited !== null) {
                $edited = "<span class='text-muted'>REDIGERAD: " . $comment->edited."</span>";
                $likeanswereditline .= "&nbsp&nbsp&nbsp".$edited;
            }

            $numberlikes = "";
            $likersusernames = "";
            if (count($commentlikes) > 0 && $commentlikes[0] != "") {
                $likersusernames = $this->di->get("comm")->getLikersUsernames($commentlikes);
                $numberlikes = "<div class='likecircle' data-toggle='tooltip' data-placement='right' title='".$likersusernames."'>+".count($commentlikes)."</div>";
            }

            // <td>".$gravatar->toHTML()."</td>
            $table .=   "<tr>
                            <td valign=top>".$gravatar->toHTML()."</td>
                            <td>".$filteredcomment."</td>
                        </tr>
                        <tr class='commentarydottedunderline' >
                            <td></td>
                            <td>
                                ".$numberlikes."
                            </div>
                            </td>
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
