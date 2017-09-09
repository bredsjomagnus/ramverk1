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
}
