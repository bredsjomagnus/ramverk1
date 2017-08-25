<?php
/**
 * Routes for the Login procedure.
 */
$app->router->add("login", [$app->LoginController, "loginpage"]);
// $app->router->post("loginprocess", [$app->LoginController, "loginprocess"]);

$app->router->add("createuser", function () use ($app) {
    $app->view->add("login/create_user");
    $app->response->setBody([$app->view, "render"])
                  ->send();
});
$app->router->add("logout", function () use ($app) {
    $app->view->add("login/logout");
    $app->response->setBody([$app->view, "render"])
                  ->send();
});
$app->router->add("logoutscreen", function () use ($app) {
    $app->view->add("login/logoutscreen");
    $app->response->setBody([$app->view, "render"])
                  ->send();
});
