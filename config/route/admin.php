<?php
/**
 * Routes for the Commentary.
 */
 /** Go to article page index.md with admincontroll features */
return [
    "routes" => [
        [
            "info" => "Admin startsida",
            "requestMethod" => null,
            "path" => "admin",
            "callable" => ["adminController", "adminPage"]
        ],
        [
            "info" => "Admin kommentarer",
            "requestMethod" => null,
            "path" => "admincomments",
            "callable" => ["adminController", "adminComments"]
        ],
    ]
];

// $app->router->add("adminpage", [$app->adminController, "adminPage"]);
$app->router->add("admincomments", [$app->adminController, "adminComments"]);
