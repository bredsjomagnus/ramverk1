<?php

namespace Maaa16\Commentary;

use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;

/**
 * A controller for the Commentary.
 *
 * @SuppressWarnings(PHPMD.ExitExpression)
 */
class CommController implements InjectionAwareInterface
{
    use InjectionAwareTrait;

    /**
     * Commetnarypage.
     *
     * @return void
     */
    public function commentarypage()
    {
        $path = $this->di->get("request")->getRoute();
        $file = ANAX_INSTALL_PATH . "/content/commentary/index.md";

        // Check that file is really in the right place
        $real = realpath($file);
        $base = realpath(ANAX_INSTALL_PATH . "/content/");
        if (strncmp($base, $real, strlen($base))) {
            return;
        }

        // Get content from markdown file
        $content = file_get_contents($file);
        $content = $this->di->get("textfilter")->parse($content, ["yamlfrontmatter", "shortcode", "markdown", "titlefromheader"]);

        // Render a standard page using layout
        $this->di->get("view")->add("default1/article", [
            "content" => $content->text
        ]);

        // Hämta comments från databasen och montera ihop tabell som skickas vidare till vyn.
        $comments = $this->di->get("comm")->getComment($this->di);
        $comments = $this->di->get("commAssembler")->assemble($comments);

        $this->di->get("view")->add("commentary/formfield", [], "formfield");
        $this->di->get("view")->add("commentary/comments", ["comments" => $comments], "comments");

        $this->di->get("pageRender")->renderPage($content->frontmatter, $path, "commentary");
    }

    /**
     * Add comment to page
     *
     * @return void
     */
    public function addComment()
    {
        if (null !== $this->di->get("request")->getPost("commentbtn")) {
            $comment = $this->di->get("request")->getPost("comment");
            $username = $this->di->get("request")->getPost("username");
            $email = $this->di->get("request")->getPost("email");
            // Kontroll om textarean är tom innan den läggs till.
            if (strlen(trim($comment))) {
                $this->di->get("comm")->addComment($this->di, $username, $email, $comment);
            }
        } else if (null !== $this->di->get("request")->getPost("resetdbbtn")) {
            $this->di->get("comm")->resetComment($this->di);
        }
        $this->commentarypage();
    }

    /**
     * Edit comment
     *
     * @return void
     */
    public function editComment()
    {
        if (null !== $this->di->get("request")->getGet("id")) {
            $id = $this->di->get("request")->getGet("id");
            $res = $this->di->get("comm")->editCommentLoad($this->di, $id);

            $path = $this->di->get("request")->getRoute();
            $file = ANAX_INSTALL_PATH . "/content/editcomment.md";
            // Check that file is really in the right place
            $real = realpath($file);
            $base = realpath(ANAX_INSTALL_PATH . "/content/");
            if (strncmp($base, $real, strlen($base))) {
                return;
            }

            // Get content from markdown file
            $content = file_get_contents($file);
            $content = $this->di->get("textfilter")->parse($content, ["yamlfrontmatter", "shortcode", "markdown", "titlefromheader"]);

            // Render a standard page using layout
            $this->di->get("view")->add("default1/article", [
                "content" => $content->text
            ]);

            // Hämta comments från databasen och montera ihop tabell som skickas vidare till vyn.
            // $comments = $this->app->comm->getComment($this->app);
            // $comments = $this->app->commAssembler->assemble($this->app, $res);

            $this->di->get("view")->add("commentary/editcomment", ["comment" => $res[0]->comm, "email" => $res[0]->email, "id" => $res[0]->id], "formfield");
            // $this->app->view->add("commentary/comments", ["comments" => $comments], "comments");

            $this->di->get("pageRender")->renderPage($content->frontmatter, $path, "commentary");
        } else {
            $this->commentarypage();
        }
    }

    /**
     * Edit comment
     *
     * @return void
     */
    public function editCommentProcess()
    {
        if (null !== $this->di->get("request")->getPost("editcommentbtn")) {
            $comment = $this->di->get("request")->getPost("comment");
            $id = $this->di->get("request")->getPost("id");
            if (strlen(trim($comment))) {
                $this->di->get("comm")->editCommentSave($this->di, $id, $comment);
            } else {
                $this->di->get("comm")->deleteComment($this->di, $id);
            }
        } else if (null !== $this->di->get("request")->getPost("deletecommentbtn")) {
            $id = $this->di->get("request")->getPost("id");
            $this->di->get("comm")->deleteComment($this->di, $id);
        }
        $this->commentarypage();
    }

    /**
     * Add like to comment
     *
     * @return void
     */
    public function addLikeProcess()
    {
        // Om användaren stämmer med vad som skickas. Så att ingen annan via url kan 'Gilla' kommentar som annan användare
        if ($this->di->get("session")->get('userid') == $this->di->get("request")->getGet("userid")) {
            // Om det finns ifylld id för comment
            if (null !== $this->di->get("request")->getGet("commentid")) {
                $userid = $this->di->get("request")->getGet("userid");
                $commentid = $this->di->get("request")->getGet("commentid");
                $this->di->get("comm")->addLike($this->di, $userid, $commentid);
            }
        }
        $this->commentarypage();
    }
}
