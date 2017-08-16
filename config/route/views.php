<?php
/**
 * Routes.
 */
$app->router->add("testing", function () use ($app) {
    $title = "testingpage | maaa16";
    $app->view->add("incl/header");
    $app->view->add("test/test");
    $app->view->add("incl/footer");

    $app->renderPage([
        "title" => $title
    ]);
});

$app->router->add("", function () use ($app) {
    $title = "Ramverk1 | maaa16";
    $app->view->add("incl/header");
    $app->view->add("incl/navbar", ["active" => "", "navbar" => "navbar-main"]);
    $app->view->add("core/index");
    $app->view->add("incl/footer");

    $app->renderPage([
        "title" => $title
    ]);
});

$app->router->add("about", function () use ($app) {
    $title = "Om | maaa16";
    $app->view->add("incl/header");
    $app->view->add("incl/navbar", ["active" => "about", "navbar" => "navbar-main"]);
    $app->view->add("core/about");
    $app->view->add("incl/footer");

    $app->renderPage([
        "title" => $title
    ]);
});

$app->router->add("report", function () use ($app) {
    $title = "Redovisningar | maaa16";
    $app->view->add("incl/header");
    $app->view->add("incl/navbar", ["active" => "report", "navbar" => "navbar-main"]);
    $app->view->add("core/report");
    $app->view->add("incl/footer");

    $app->renderPage([
        "title" => $title
    ]);
});
