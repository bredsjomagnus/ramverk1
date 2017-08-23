<?php
/**
 * Routes for the REM Server.
 */
 /** Start the session and initiate the REM Server. */
$app->router->add("commentary", [$app->commController, "commentarypage"]);

$app->router->get("addcomment", [$app->commController, "addComment"]);

/** Init or re-init the REM Server. */
$app->router->get("comm/init", [$app->commController, "anyInit"]);

/** Destroy the session. */
$app->router->get("comm/destroy", [$app->commController, "anyDestroy"]);

/** Get the dataset or parts of it. */
$app->router->get("comm/{dataset:alphanum}", [$app->commController, "getDataset"]);

/** Get one item from the dataset. */
$app->router->get("comm/{dataset:alphanum}/{id:digit}", [$app->commController, "getItem"]);

/** Create a new item and add to the dataset */
$app->router->post("comm/{dataset:alphanum}", [$app->commController, "postItem"]);

/** Upsert/replace an item in the dataset. */
$app->router->put("comm/{dataset:alphanum}/{id:digit}", [$app->commController, "putItem"]);

/** Delete an item from the dataset */
$app->router->delete("comm/{dataset:alphanum}/{id:digit}", [$app->commController, "deleteItem"]);

/** Show a message that the route is unsupported, a local 404. */
$app->router->add("comm/**", [$app->commController, "anyUnsupported"]);

/*
return [
    "routes" => [
        [
            "info" => "Start the session and initiate the REM Server.",
            "requestMethod" => null,
            "path" => "api/**",
            "callable" => ["remController", "anyPrepare"]
        ],
        [
            "info" => "Init or re-init the REM Server.",
            "requestMethod" => "get",
            "path" => "api/init",
            "callable" => ["remController", "anyInit"]
        ],
        [
            "info" => "Destroy the session.",
            "requestMethod" => "get",
            "path" => "api/destroy",
            "callable" => ["remController", "anyDestroy"]
        ],
        [
            "info" => "Get the dataset or parts of it.",
            "requestMethod" => "get",
            "path" => "api/{dataset:alphanum}",
            "callable" => ["remController", "getDataset"]
        ],
        [
            "info" => "Get one item from the dataset.",
            "requestMethod" => "get",
            "path" => "api/{dataset:alphanum}/{id:digit}",
            "callable" => ["remController", "getItem"]
        ],
        [
            "info" => "Create a new item and add to the dataset.",
            "requestMethod" => "post",
            "path" => "api/{dataset:alphanum}",
            "callable" => ["remController", "postItem"]
        ],
        [
            "info" => "Upsert/replace an item in the dataset.",
            "requestMethod" => "put",
            "path" => "api/{dataset:alphanum}/{id:digit}",
            "callable" => ["remController", "putItem"]
        ],
        [
            "info" => "Delete an item from the dataset.",
            "requestMethod" => "delete",
            "path" => "api/{dataset:alphanum}/{id:digit}",
            "callable" => ["remController", "deleteItem"]
        ],
        [
            "info" => "Show a message that the route is unsupported, a local 404.",
            "requestMethod" => null,
            "path" => "api/**",
            "callable" => ["remController", "anyUnsupported"]
        ],
    ]
];
*/
