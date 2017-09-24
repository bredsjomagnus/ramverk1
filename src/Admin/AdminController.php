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
        // $path = $this->di->get("request")->getRoute();
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
        $title = "Admin | Maaa16";
        $this->di->get("pageRender")->renderAdminPage(["title" => $title], 'admin');
    }

    /**
     * Adminpage.
     *
     * @return void
     */
    public function adminComments()
    {
        $file = ANAX_INSTALL_PATH . "/content/admin/comments.md";

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
        $title = "Admin | Maaa16";
        // Hämta comments från databasen och montera ihop tabell som skickas vidare till vyn.
        $comments = $this->di->get("comm")->getComment();
        $comments = $this->di->get("adminAssembler")->getComments($comments);
        $this->di->get("view")->add("admin/admincomments", ["comments" => $comments]);

        $this->di->get("pageRender")->renderAdminPage(["title" => $title], 'admin');
    }

    /**
    * Admin accounts.
    *
    * @return void
    */
    public function adminAccounts()
    {
        if ($this->checkAdminRole()) {
            $title = "Admin | Konton";
            $accounts = $this->di->get("admin")->getAccounts();
            $accountstable = $this->di->get("adminAssembler")->getAccountsTable($accounts);
            $this->di->get("view")->add("admin/adminaccounts", ["accountstable" => $accountstable]);
            $this->di->get("pageRender")->renderAdminPage(["title" => $title], 'admin');
        } else {
            $this->di->get("response")->redirect("login");
        }
    }

    /**
    * Edit accounts
    *
    * @return void
    */
    public function adminEditAccount()
    {
        if ($this->checkAdminRole()) {
            $title = "Admin | Redigera konton";
            $singleaccount = $this->di->get("admin")->getSingleAccount($this->di->get("request")->getGet('id'));
            $editaccountHTML = $this->di->get("adminAssembler")->getEditAccountTable($singleaccount);
            $this->di->get("view")->add("admin/admineditaccount", ["editaccountHTML" => $editaccountHTML]);
            $this->di->get("pageRender")->renderAdminPage(["title" => $title], 'admin');
        } else {
            $this->di->get("response")->redirect("login");
        }
    }

    public function adminEditAccountProcess()
    {
        if ($this->checkAdminRole()) {
            if ($this->di->get('request')->getPost('editaccountbtn') != null) {
                $userdata = [
                                "role" => htmlentities($this->di->get("request")->getPost('role')),
                                "active" => htmlentities($this->di->get("request")->getPost('active')),
                                "forname" => htmlentities($this->di->get("request")->getPost('forname')),
                                "surname" => htmlentities($this->di->get("request")->getPost('surname')),
                                // "username" => htmlentities($this->di->get("request")->getPost('username')),
                                // "email" => htmlentities($this->di->get("request")->getPost('email')),
                                "address" => htmlentities($this->di->get("request")->getPost('address')),
                                "postnumber" => htmlentities($this->di->get("request")->getPost('postnumber')),
                                "city" => htmlentities($this->di->get("request")->getPost('city')),
                                "phone" => htmlentities($this->di->get("request")->getPost('phone')),
                                "mobile" => htmlentities($this->di->get("request")->getPost('mobile')),
                                "notes" => htmlentities($this->di->get("request")->getPost('notes'))
                            ];
                $id = htmlentities($this->di->get("request")->getPost('id'));
                $this->di->get("admin")->editAccount($id, $userdata);
                $this->adminAccounts();
            } else if ($this->di->get('request')->getPost('deleteaccountbtn') != null) {
                $id = htmlentities($this->di->get("request")->getPost('id'));
                $this->di->get("admin")->deleteAccount($id);
                $this->adminAccounts();
            }
        }
    }

    public function checkAdminRole()
    {
        return ($this->di->get("session")->get("role") == "admin") ? true : false;
    }
}
