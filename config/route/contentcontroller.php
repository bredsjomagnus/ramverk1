<?php
/**
 * Routes for controller.
 */
return [
    "routes" => [
        [
            "info" => "Innehåll",
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
        [
            "info" => "Update content.",
            "requestMethod" => "get|post",
            "path" => "update/{id:digit}",
            "callable" => ["contentController", "getPostUpdateContent"],
        ],
    ]
];
