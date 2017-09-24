<?php

namespace Maaa16\Login;

use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;

/**
 * A controller for the Commentary.
 *
 * @SuppressWarnings(PHPMD.ExitExpression)
 */
class LoginController implements InjectionAwareInterface
{
    use InjectionAwareTrait;

    /**
    * Loginpage.
    *
    * @return void
    */
    public function loginpage()
    {
        $this->di->get("view")->add("login/login");
        $title = "Login | maaa16";
        $this->di->get("pageRender")->renderPage(["title" => $title], "login");
    }

    /**
    * Loginprocess
    *
    * @return void
    */
    public function loginProcess()
    {
        if (null != $this->di->get("request")->getPost("loginsubmit")) {
            $userdone = true;
            $passdone = true;
            // $passdone = false;
            if ($this->di->get("request")->getPost('user') == "") {
                $this->di->get("session")->set("usermsg", "&nbsp;&nbsp;&nbsp; Måste fylla i användarnamn");
                $userdone = false;
            }
            if ($this->di->get("request")->getPost('pass') == "") {
                $this->di->get("session")->set("passmsg", "&nbsp;&nbsp;&nbsp;* Måste fylla i lösenord");
                $passdone = false;
            }
            if ($userdone && $passdone) {
                $loginuser =  htmlentities($this->di->get("request")->getPost("user"));
                $loginpass =  htmlentities($this->di->get("request")->getPost("pass"));
                $this->di->get("database")->connect();
                $sql = "SELECT * FROM ramverk1accounts WHERE BINARY username = BINARY '$loginuser'";
                if ($res = $this->di->get("database")->executeFetchAll($sql)) {
                    $dbpass = $res[0]->pass;
                    $this->di->get("session")->set("loginmsg", "<span>kommer åt databasen vid inloggningsförsök</span>");
                    $passwordverify = password_verify($loginpass, $dbpass);
                    if ($res[0]->active != 'yes') {
                        $this->di->get("session")->set("loginmsg", "<span class='formerror'>&nbsp;&nbsp;&nbsp; Konto deaktiverat av administratör.</span>");
                    } else if ($passwordverify) {
                        // $this->di->get("session")->set("user", $loginuser);
                        // $this->di->get("session")->set("user", "fiskmås");

                        $this->di->get("session")->set("user", $loginuser);
                        $this->di->get("session")->set("role", $res[0]->role);
                        $this->di->get("session")->set("email", $res[0]->email);
                        $this->di->get("session")->set("userid", $res[0]->id);
                        $this->di->get("session")->set("hash", password_hash($loginpass, PASSWORD_DEFAULT));
                        // $app->session->set("forname", $res[0]->forname);
                        $this->di->get("cookie")->set("user", $loginuser);
                        $this->di->get("cookie")->set("forname", $res[0]->forname);
                        // if (isset($_POST['remember'])) {
                        //     $this->di->get("cookie")->set("password", $loginpass);
                        // }
                        // $loginmsg = "<span class='formerror'>&nbsp;&nbsp;&nbsp; Du är nu inloggad, ".$res[0]->forname.", ".$this->di->get("session")->get('email')."</span>";
                        $this->di->get("session")->set("loginmsg", "<span class='formerror'>&nbsp;&nbsp;&nbsp; Du är nu inloggad, ".$this->di->get("session")->get('user').", ".$this->di->get("session")->get('email')."</span>");
                        // Koden nedan ger maximum nesting reached.
                        // $app->view->add("login/welcome");
                        // $app->renderPage(["title" => "välkommen"], "login");
                        // exit;

                        $this->di->get("session")->delete("loginmsg");
                        $this->di->get("session")->delete("usermsg");
                        $this->di->get("session")->delete("passmsg");

                        $sql = "UPDATE ramverk1accounts SET inlogged = CURRENT_TIMESTAMP WHERE BINARY username = BINARY ?";
                        $params = [$loginuser];
                        $this->di->get("database")->execute($sql, $params);

                        $this->di->get("response")->redirect("accountinfo");


                        // funkar inte.
                    } else {
                        $this->di->get("session")->set("loginmsg", "<span class='formerror'>&nbsp;&nbsp;&nbsp; Felaktigt användarnamn eller lösenord</span>");
                    }
                } else {
                    $this->di->get("session")->set("loginmsg", "<span class='formerror'>&nbsp;&nbsp;&nbsp; Felaktigt användarnamn eller lösenord</span>");
                }
            }
        }
        $this->loginpage();
    }

    /**
    * Accountpage
    *
    * @return void
    */
    public function accountPage()
    {
        $this->di->get("view")->add("login/accountinfo");
        $title = "Konto | maaa16";
        $this->di->get("pageRender")->renderPage(["title" => $title], "login");
    }

    /**
    * Logoutprocess
    *
    * @return void
    */
    public function logoutProcess()
    {
        $this->di->get("session")->delete('user');
        $this->di->get("session")->delete('role');
        $this->di->get("session")->delete('email');
        // $this->di->get("cookie")->delete('user');
        $this->di->get("cookie")->delete('forname');
        $this->loginpage();
    }

    /**
    * Logoutprocess
    *
    *
    * @SuppressWarnings("PMD")
    * @return void
    */
    public function createAccountProcess()
    {

        // if ($this->di->get("request")->getPost("createuserbtn") != null) {
        if (isset($_POST['createuserbtn'])) {
            // $forname = isset($_POST['forname']) ? htmlentities($_POST['forname']) : null;
            // $surname = isset($_POST['surname']) ? htmlentities($_POST['surname']) : null;
            // $email = isset($_POST['email']) ? htmlentities($_POST['email']) : null;
            // $username = isset($_POST['username']) ? htmlentities($_POST['username']) : null;
            // $passone = isset($_POST['passone']) ? htmlentities($_POST['passone']) : null;
            // $passtwo = isset($_POST['passtwo']) ? htmlentities($_POST['passtwo']) : null;
            $forname = (null != $this->di->get("request")->getPost("forname")) ? htmlentities($this->di->get("request")->getPost("forname")) : null;
            $surname = (null != $this->di->get("request")->getPost("surname")) ? htmlentities($this->di->get("request")->getPost("surname")) : null;
            $email = (null != $this->di->get("request")->getPost("email")) ? htmlentities($this->di->get("request")->getPost("email")) : null;
            $username = (null != $this->di->get("request")->getPost("username")) ? htmlentities($this->di->get("request")->getPost("username")) : null;
            $passone = (null != $this->di->get("request")->getPost("passone")) ? htmlentities($this->di->get("request")->getPost("passone")) : null;
            $passtwo = (null != $this->di->get("request")->getPost("passtwo")) ? htmlentities($this->di->get("request")->getPost("passtwo")) : null;
            $this->di->get("session")->delete('createusererrormsg');
            if ($forname == null || $surname == null || $email == null || $username == null || $passone == null || $passtwo == null) {
                $this->di->get("session")->set('createusererrormsg', "<br /><p class='formerror'>Nytt konto skapades inte.</p><p class='formerror'>Alla fält måste fyllas i när du skapar nytt konto.</p>");
                $this->loginpage();
            } else {
                $this->di->get("login")->createNewAccount($forname, $surname, $email, $username, $passone, $passtwo);
                $this->di->get("response")->redirect("accountinfo");
            }
        }

        // $this->di->get("response")->redirect("about");
    }

    /**
    * Change password process
    *
    * @return void
    */
    public function changePasswordProcess()
    {
        $this->di->get("database")->connect();
        $username = $this->di->get("session")->get('user', "");
        $this->di->get("login")->changePasswordProcess($username);
    }
}
