<?php
/**
 * Routes for the Commentary.
 */
 /** Go to article page index.md with admincontroll features */
$app->router->add("adminpage", [$app->adminController, "adminPage"]);
$app->router->add("admincomments", [$app->adminController, "adminComments"]);
