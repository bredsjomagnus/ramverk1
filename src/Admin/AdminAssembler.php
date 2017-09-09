<?php

namespace Maaa16\Admin;

use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;

/**
 * REM Server.
 */
class AdminAssembler implements InjectionAwareInterface
{
    use InjectionAwareTrait;

    public function getComments($res)
    {
        $table = "<table class='commenttable'>";
        $table .=   "<thead>
                        <tr>
                            <th class='avatarcolumn'>
                            </th>
                            <th>
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
            $filteredcomment = $this->di->get("textfilter")->markdown($comment->comm);

            $editcommenturl = $this->di->get("url")->create("editcomment") ."?id=". $comment->id;

            $table .=   "<tr>
                            <td valign=top>".$gravatar->toHTML()."</td>
                            <td>".$filteredcomment."</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><a href='".$editcommenturl."'>Redigera</a></td>
                        </tr>";
        }
        $table .=   "</tbody>
                    </table>";
        return $table;
    }
}
