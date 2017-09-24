<?php

namespace Maaa16\Admin;

use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;

/**
 * REM Server.
 */
class Admin implements InjectionAwareInterface
{
    use InjectionAwareTrait;

    public function getComments()
    {
        $this->di->get("database")->connect();
        $sql = "SELECT * FROM ramverk1comments";
        $res = $this->di->get("database")->executeFetchAll($sql);
        return $res;
    }

    public function getAccounts()
    {
        $this->di->get("database")->connect();
        $sql = "SELECT * FROM ramverk1accounts";
        $res = $this->di->get("database")->executeFetchAll($sql);
        return $res;
    }

    public function getLastLoggedIn($id, $default)
    {
        $this->di->get("database")->connect();
        $sql = "SELECT inlogged FROM ramverk1accounts WHERE id = ?";
        $params = [$id];
        $res = $this->di->get("database")->executeFetchAll($sql, $params);
        if ($res[0]->inlogged != null) {
            $result = $res[0]->inlogged;
        } else {
            $result = $default;
        }
        return $result;
    }

    public function getSingleAccount($id)
    {
        $this->di->get("database")->connect();
        $sql = "SELECT * FROM ramverk1accounts WHERE id = ?";
        $params = [$id];
        // $res = $this->di->get("database")->executeFetchAll($sql, $params);
        return $this->di->get("database")->executeFetchAll($sql, $params);
    }

    public function editAccount($id, $userdata)
    {
        $this->di->get("database")->connect();
        $sql = "UPDATE ramverk1accounts SET role = ?, active = ?, forname = ?, surname = ?, address = ?, postnumber = ?, city = ?, phone = ?, mobile = ?, notes = ? WHERE id = ?";
        $params = [$userdata['role'], $userdata['active'], $userdata["forname"], $userdata["surname"], $userdata["address"], $userdata["postnumber"], $userdata["city"], $userdata["phone"], $userdata["mobile"], $userdata["notes"], $id];
        $this->di->get("database")->execute($sql, $params);
    }

    public function resetPassword($id, $password)
    {
        $this->di->get("database")->connect();
        $securepass = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE ramverk1accounts SET pass = ? WHERE id = ?";
        $params = [$securepass, $id];
        $this->di->get("database")->execute($sql, $params);
    }

    public function deleteAccount($id)
    {
        $this->di->get("database")->connect();
        $sql = "SELECT * FROM ramverk1accounts WHERE id = ?";
        $params = [$id];
        $res = $this->di->get("database")->executeFetchAll($sql, $params);
        $username = $res[0]->username;

        $sql = "DELETE FROM ramverk1accounts WHERE id = ?";
        $params = [$id];
        $this->di->get("database")->execute($sql, $params);

        // Måste kolla igenom alla jävla kommentarer för att se om den gillats.... skiter i det förresten.
        $sql = "SELECT * FROM ramverk1comments";
        $res = $this->di->get("database")->executeFetchAll($sql, $params);
        $remove = [$id];
        foreach ($res as $comment) {
            $likes = $comment->likes;
            $likes = explode(",", $likes);
            if (in_array($id, $likes)) {
                $likes = array_diff($likes, $remove);
                $likes = implode(",", $likes);
                $sql = "UPDATE ramverk1comments SET likes = ? WHERE id = ?";
                $params = [$likes, $comment->id];
                $this->di->get("database")->execute($sql, $params);
            }
        }

        $sql = "DELETE FROM ramverk1comments WHERE username = ?";
        $params = [$username];
        $this->di->get("database")->execute($sql, $params);
    }
}
