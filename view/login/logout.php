<?php

$app->session->delete('user');
$app->session->delete('role');
$app->cookie->delete('user');
$app->cookie->delete('forname');

// header("Location: logoutscreen");
?>
