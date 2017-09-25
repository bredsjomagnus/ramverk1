<?php
/**
 * Routes for controller.
 */
return [
    "routes" => [
        [
            "info" => "Admin innehåll",
            "requestMethod" => null,
            "path" => "",
            "callable" => ["contentController", "getIndex"]
        ],
        [
            "info" => "Create an item.",
            "requestMethod" => "get|post",
            "path" => "create",
            "callable" => ["contentController", "getPostCreateContent"],
        ],
    ]
];
