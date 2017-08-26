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
            $gravatar->size = 30;
            $gravatar->rating = "G";
            $gravatar->border = "FF0000";
            $filteredcomment = $app->textfilter->markdown($comment->comm);

            // <td>".$gravatar->toHTML()."</td>
            $table .=   "<tr>
                            <td>".$gravatar->toHTML()."</td>
                            <td>".$filteredcomment."</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><a href='#'>Gilla</a>&nbsp&nbsp&nbsp<a href='#'>Svara</a></td>
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
