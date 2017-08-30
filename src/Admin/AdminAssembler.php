<?php

namespace Maaa16\Admin;

use \Anax\Common\AppInjectableInterface;
use \Anax\Common\AppInjectableTrait;

/**
 * REM Server.
 */
class AdminAssembler implements AppInjectableInterface
{
    use AppInjectableTrait;

    public function getComments($res) {
        $table = "<table class='commenttable'>";
        $table .=   "<thead>
                        <tr>
                            <th class='avatarcolumn'>
                            </th>
                        </tr>
                    </thead>
                    <tbody>";
        foreach ($res as $comment) {
            $default = "http://i.imgur.com/CrOKsOd.png"; // Optional
            $gravatar = new \Maaa16\Gravatar\Gravatar($comment->email, $default);
            $gravatar->size = 50;
            $gravatar->rating = "G";
            $gravatar->border = "FF0000";
            $filteredcomment = $this->app->textfilter->markdown($comment->comm);
            // <td>".$gravatar->toHTML()."</td>
            $table .=   "<tr>
                            <td valign=top>".$gravatar->toHTML()."</td>
                            <td>".$filteredcomment."</td>
                        </tr>";
        }
        $table .=   "</tbody>
                    </table>";
        return $table;
    }
}
