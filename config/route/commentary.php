<?php
/**
 * Routes for the Commentary.
 */
return [
    "routes" => [
         [
            "info" => "Kommentarssida",
            "requestMethod" => null,
            "path" => "commentary",
            "callable" => ["commController", "commentarypage"]
        ],
        [
            "info" => "Lägg till kommentar",
            "requestMethod" => "post",
            "path" => "addcomment",
            "callable" => ["commController", "addComment"]
        ],
        [
            "info" => "Redigera kommentar",
            "requestMethod" => "get",
            "path" => "editcomment",
            "callable" => ["commController", "editComment"]
        ],
        [
            "info" => "Redigera kommentar process",
            "requestMethod" => "post",
            "path" => "editcommentprocess",
            "callable" => ["commController", "editCommentProcess"]
        ],
        [
            "info" => "Lägg till gilla process",
            "requestMethod" => "get",
            "path" => "addlikeprocess",
            "callable" => ["commController", "addLikeProcess"]
        ],
    ]
];


//  /** Go to article page index.md with commentary features */
// $app->router->add("commentary", [$app->commController, "commentarypage"]);
//
// /** Posting new comment or reseting db (development)*/
// $app->router->post("addcomment", [$app->commController, "addComment"]);
// // Edit comment
// $app->router->get("editcomment", [$app->commController, "editComment"]);
// // Edit comment process
// $app->router->post("editcommentprocess", [$app->commController, "editCommentProcess"]);
// // Add like to comment
// $app->router->get("addlikeprocess", [$app->commController, "addLikeProcess"]);
