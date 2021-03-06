<?php
/**
 * Routes to ease development and debugging.
 */
 return [
     "routes" => [
         [
             "info" => "Debug and information.",
             "requestMethod" => null,
             "path" => "info",
             "callable" => ["debugController", "info"],
         ],
     ]
 ];

/**
 * Dump general information
 */
// $app->router->add("debug/info", function () use ($app) {
//     // Add views to a specific region
//     $app->view->add("default1/info");
//
//     // Render a standard page using layout
//     $app->renderPage([
//         "title" => "Info",
//     ]);
// });
