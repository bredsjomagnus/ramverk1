<?php

namespace Maaa16\Admin;

use \Anax\Common\AppInjectableInterface;
use \Anax\Common\AppInjectableTrait;

/**
 * REM Server.
 */
class Admin implements AppInjectableInterface
{
    use AppInjectableTrait;

    public function getComments()
    {
        $this->app->database->connect();
        $sql = "SELECT * FROM ramverk1comments";
        $res = $this->app->database->executeFetchAll($sql);
        return $res;
    }
}
