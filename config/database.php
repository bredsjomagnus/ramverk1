<?php

/**
 * Details for connecting to the database depending on server name
 */

if ($_SERVER['SERVER_NAME'] == "www.student.bth.se") {
    $dbconfig = [
        "database" => [
                "dns"       => "mysql:host=blu-ray.student.bth.se;dbname=maaa16;",
                "user"      => "maaa16",
                "password"  => "tWabjxC6eEH6",
                "options"   => [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"]
            ]
        ];
} else {
    $dbconfig = [
        "database" => [
                "dns"       => "mysql:host=localhost;dbname=ramverk1;",
                "user"      => "root",
                "password"  => "",
                "options"   => [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"]
            ]
        ];
}

return $dbconfig;

// return [
//     "database" => [
//         "dns"      => "mysql:host=localhost;dbname=test;",
//         "options"  => "[PDO::MYSQL_ATTR_INIT_COMMAND => \"SET NAMES 'UTF8'\"]"
//     ]
// ];
// $databaseConfig = [
//     $dsn      = "mysql:host=blu-ray.student.bth.se;dbname=maaa16;",
//     $login    = "maaa16",
//     $password = "tWabjxC6eEH6",
//     $options  = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"],
// ];
