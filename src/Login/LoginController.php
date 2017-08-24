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

    public function loginpage()
    {
        // För att tala om för navbaren vilken länk som är aktiv
        $path = $this->app->request->getRoute();
        $this->app->view->add("login/login");
        $title = "Login | maaa16";
        $this->app->renderPage(["title" => $title], $path);
    }
}
