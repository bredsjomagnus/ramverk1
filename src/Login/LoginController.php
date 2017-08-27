<?php

namespace Maaa16\Login;

use \Anax\Common\AppInjectableInterface;
use \Anax\Common\AppInjectableTrait;

/**
 * A controller for the Commentary.
 *
 * @SuppressWarnings(PHPMD.ExitExpression)
 */
class LoginController implements AppInjectableInterface
{
    use AppInjectableTrait;

    /**
    * Loginpage.
    *
    * @return void
    */
    public function loginpage()
    {
        // För att tala om för navbaren vilken länk som är aktiv
        $path = $this->app->request->getRoute();
        // $this->app->view->add("login/login", [], "main");
        $this->app->view->add("login/login");
        // $this->app->view->add("incl/header", [], "header");
        // $this->app->view->add("incl/navbar", ["active" => $path, "navbar" => "navbar-main"], "navbar");
        // $this->app->view->add("incl/footer", [], "footer");
        $title = "Login | maaa16";
        // $this->app->response->setBody([$this->app->view, "render"])
        //               ->send();
        $this->app->renderPage(["title" => $title], $path);
    }

    /**
    * Loginpage.
    *
    * @return void
    */
    public function accountpage()
    {
        // För att tala om för navbaren vilken länk som är aktiv
        $path = $this->app->request->getRoute();
        // $this->app->view->add("login/login", [], "main");
        $this->app->view->add("login/accountinfo");
        // $this->app->view->add("incl/header", [], "header");
        // $this->app->view->add("incl/navbar", ["active" => $path, "navbar" => "navbar-main"], "navbar");
        // $this->app->view->add("incl/footer", [], "footer");
        $title = "Konto | maaa16";
        // $this->app->response->setBody([$this->app->view, "render"])
        //               ->send();
        $this->app->renderPage(["title" => $title], $path);
    }

    /**
    * Loginprocess
    *
    * @return void
    */
    public function loginprocess()
    {
        if (null !== $this->app->request->getPost("loginsubmit")) {
            $user = $this->app->request->getPost("user");
            $pass = $this->app->request->getPost("pass");
            $remember = $this->app->request->getPost("remember");
            $this->app->view->add("login/loginprocess", ["user" => $user, "pass" => $pass, "remember" => $remember]);
            $this->app->response->setBody([$this->app->view, "render"])
                          ->send();
        }
        // $this->loginpage();
    }
}
