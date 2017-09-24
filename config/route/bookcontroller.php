<?php
/**
 * Routes for controller.
 */
return [
    "routes" => [
        [
            "info" => "Landing page.",
            "requestMethod" => "get",
            "path" => "",
            "callable" => ["bookController", "getIndex"],
        ],
        [
            "info" => "View all books.",
            "requestMethod" => "get",
            "path" => "view-all",
            "callable" => ["bookController", "getAllBooks"],
        ],
        [
            "info" => "Create an item.",
            "requestMethod" => "get|post",
            "path" => "add-book",
            "callable" => ["bookController", "getPostCreateItem"],
        ],
        [
            "info" => "Delete an item.",
            "requestMethod" => "get|post",
            "path" => "delete",
            "callable" => ["bookController", "getPostDeleteItem"],
        ],
        [
            "info" => "Update an item.",
            "requestMethod" => "get|post",
            "path" => "update/{id:digit}",
            "callable" => ["bookController", "getPostUpdateItem"],
        ],
    ]
];
