<?php

namespace Maaa16\Commentary;

use \Anax\Common\AppInjectableInterface;
use \Anax\Common\AppInjectableTrait;

/**
 * A controller for the Commentary.
 *
 * @SuppressWarnings(PHPMD.ExitExpression)
 */
class CommController implements AppInjectableInterface
{
    use AppInjectableTrait;

    /**
     * Commetnarypage.
     *
     * @return void
     */
    public function commentarypage()
    {
        $path = $this->app->request->getRoute();
        $file = ANAX_INSTALL_PATH . "/content/commentary/index.md";

        // Check that file is really in the right place
        $real = realpath($file);
        $base = realpath(ANAX_INSTALL_PATH . "/content/");
        if (strncmp($base, $real, strlen($base))) {
            return;
        }

        // Get content from markdown file
        $content = file_get_contents($file);
        $content = $this->app->textfilter->parse($content, ["yamlfrontmatter", "shortcode", "markdown", "titlefromheader"]);

        // Render a standard page using layout
        $this->app->view->add("default1/article", [
            "content" => $content->text
        ]);

        // Hämta comments från databasen och montera ihop tabell som skickas vidare till vyn.
        $comments = $this->app->comm->getComment($this->app);
        $comments = $this->app->commAssembler->assemble($this->app, $comments);

        $this->app->view->add("commentary/formfield", [], "formfield");
        $this->app->view->add("commentary/comments", ["comments" => $comments], "comments");

        $this->app->renderPage($content->frontmatter, $path, "commentary");
    }

    /**
     * Add comment to page
     *
     * @return void
     */
    public function addComment()
    {
        if (null !== $this->app->request->getPost("commentbtn")) {
            $comment = $this->app->request->getPost("comment");
            $username = $this->app->request->getPost("username");
            $email = $this->app->request->getPost("email");
            $this->app->comm->addComment($this->app, $username, $email, $comment);
        } else if (null !== $this->app->request->getPost("resetdbbtn")) {
            $this->app->comm->resetComment($this->app);
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
        if (null !== $this->app->request->getGet("id")) {
            $id = $this->app->request->getGet("id");
            $res = $this->app->comm->editCommentLoad($this->app, $id);

            $path = $this->app->request->getRoute();
            $file = ANAX_INSTALL_PATH . "/content/editcomment.md";
            // Check that file is really in the right place
            $real = realpath($file);
            $base = realpath(ANAX_INSTALL_PATH . "/content/");
            if (strncmp($base, $real, strlen($base))) {
                return;
            }

            // Get content from markdown file
            $content = file_get_contents($file);
            $content = $this->app->textfilter->parse($content, ["yamlfrontmatter", "shortcode", "markdown", "titlefromheader"]);

            // Render a standard page using layout
            $this->app->view->add("default1/article", [
                "content" => $content->text
            ]);

            // Hämta comments från databasen och montera ihop tabell som skickas vidare till vyn.
            // $comments = $this->app->comm->getComment($this->app);
            // $comments = $this->app->commAssembler->assemble($this->app, $res);

            $this->app->view->add("commentary/editcomment", ["comment" => $res[0]->comm, "email" => $res[0]->email], "formfield");
            // $this->app->view->add("commentary/comments", ["comments" => $comments], "comments");

            $this->app->renderPage($content->frontmatter, $path, "commentary");
        } else {
            $this->commentarypage();
        }

    }
}
