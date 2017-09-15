<?php

namespace Maaa16\Login;

use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;

/**
 * REM Server.
 */
class Login implements InjectionAwareInterface
{
    use InjectionAwareTrait;

    public function createNewAccount($forname, $surname, $email, $username, $passone, $passtwo)
    {
        $this->di->get("database")->connect();
        $sql = "SELECT * FROM ramverk1accounts WHERE username = '$username'";
        if ($passone != $passtwo) {
            $this->di->get("session")->set('createusererrormsg', "<br /><p class='formerror'>Nytt konto skapades inte.</p><p class='formerror'>Lösenordet var inte samma vid upprepning.</p>");
        } else if ($this->di->get("database")->executeFetchAll($sql)) {
            $this->di->get("session")->set('createusererrormsg', "<br /><p class='formerror'>Nytt konto skapades inte.</p><p class='formerror'>Det finns redan konto med det användarnamnet.</p>");
        } else if ($passone == $passtwo) {
            $securepass = password_hash($passone, PASSWORD_DEFAULT);
            $sql = "INSERT INTO ramverk1accounts (role, username, pass, forname, surname, email) VALUES (?, ?, ?, ?, ?, ?)";
            $params = ['user', $username, $securepass, $forname, $surname, $email];
            $this->di->get("database")->execute($sql, $params);
            $this->di->get("session")->set("user", $username);
            $this->di->get("session")->set("email", $email);
            $this->di->get("session")->set("role", 'user');
            $this->di->get("cookie")->set("user", $username);
            $this->di->get("session")->set("userid", $this->di->get("database")->lastInsertId());
            $this->di->get("cookie")->set("forname", $forname);
        }
    }

    /**
    *
    */
    // public function changePasswordProcess()
    // {
    //     $sql = "SELECT * FROM accounts WHERE username = '$username'";
    //     if ($res = $this->di->get("database")->executeFetchAll($sql)) {
    //         $forname = $res[0]->forname;
    //         $surname = $res[0]->surname;
    //         $securepass = $res[0]->pass;
    //         $this->di->get("session")->set("changepassword", true);
    //     } else {
    //         $this->di->get("session")->set("changepassword", false);
    //     }
    // }
}
