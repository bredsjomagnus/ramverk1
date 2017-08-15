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

$app->router->add("vinyl", function () use ($app) {
    // $urlstyle = dirname($_SERVER['PHP_SELF'])."/css/style.css";
    $title = "vinyl | maaa16";
    $app->view->add("incl/header");
    // $app->view->add("navbar2/navbar", ["active" => ""]);
    $app->view->add("test/test");
    // $app->view->add("take1/byline");
    $app->view->add("incl/footer");


    $app->renderPage([
        "title" => $title
    ]);
});
