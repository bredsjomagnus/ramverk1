<?php
/**
 * Routes.
 */

$app->router->add("testing", function () use ($app) {
    $title = "testingpage";
    $app->view->add("test/test");

    $app->renderPage([
        "title" => $title
    ]);
});


require __DIR__ . "/route/internal.php";
require __DIR__ . "/route/debug.php";
require __DIR__ . "/route/flat-file-content.php";

// Catch all route last
require __DIR__ . "/route/404.php";
