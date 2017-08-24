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
    public function assemble($comments)
    {
        $table = "";
        $table = "<table class='commenttable'>";
        $table .=   "<thead>
                        <tr>
                            <th colspan='1'>
                                KOMMENTAR
                            </th>
                        </tr>
                    </thead>
                    <tbody>";
        foreach ($comments as $comment) {
            $default = "http://i.imgur.com/CrOKsOd.png"; // Optional
            $gravatar = new \Maaa16\Gravatar\Gravatar($comment->email, $default);
            $gravatar->size = 30;
            $gravatar->rating = "G";
            $gravatar->border = "FF0000";

            // <td>".$gravatar->toHTML()."</td>
            $table .=   "<tr>
                            <td>".$gravatar->toHTML()."</td>
                            <td>".$comment->comm."</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><i>".$comment->created." ".$comment->username."</i></td>
                        </tr>";
        }
        $table .=   "</tbody>
                    </table>";
        return $table;
    }

}
