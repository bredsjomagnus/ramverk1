<?php
/**
 * Routes for the Commentary.
 */
 /** Go to article page index.md with commentary features */
$app->router->add("commentary", [$app->commController, "commentarypage"]);

/** Posting new comment or reseting db (development)*/
$app->router->post("addcomment", [$app->commController, "addComment"]);
// Edit comment
$app->router->get("editcomment", [$app->commController, "editComment"]);
// Edit comment process
$app->router->post("editcommentprocess", [$app->commController, "editCommentProcess"]);
