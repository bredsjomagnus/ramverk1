<?php
/**
* Routes.
*/

require __DIR__ . "/route/remserver.php";
require __DIR__ . "/route/commentary.php";
require __DIR__ . "/route/admin.php";
require __DIR__ . "/route/login.php";
require __DIR__ . "/route/internal.php";
require __DIR__ . "/route/debug.php";
require __DIR__ . "/route/flat-file-content.php";
require __DIR__ . "/route/views.php";

// Catch all route last
require __DIR__ . "/route/404.php";
