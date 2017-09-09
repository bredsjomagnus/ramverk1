<?php

namespace Maaa16\Admin;

use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;

/**
 * A controller for the Commentary.
 *
 * @SuppressWarnings(PHPMD.ExitExpression)
 */
class AdminController implements InjectionAwareInterface
{
    use InjectionAwareTrait;

    /**
     * Adminpage.
     *
     * @return void
     */
    public function adminPage()
    {
        $path = $this->di->get("request")->getRoute();
        $file = ANAX_INSTALL_PATH . "/content/admin/index.md";

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
        // $comments = $this->app->commAssembler->assemble($this->app, $comments);

        $this->di->get("view")->add("admin/adminpage");

        $this->di->get("pageRender")->renderAdminPage($content->frontmatter, $path);
    }

    /**
     * Adminpage.
     *
     * @return void
     */
    public function adminComments()
    {
        $path = $this->app->request->getRoute();
        $file = ANAX_INSTALL_PATH . "/content/admin/comments.md";

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

        $comments = $this->app->admin->getComments();
        $comments = $this->app->adminAssembler->getComments($comments);

        $this->app->view->add("admin/admincomments", ["comments" => $comments]);

        $this->app->renderAdminPage($content->frontmatter, $path);
    }
}
