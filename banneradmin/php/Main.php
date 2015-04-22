<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    require_once('Autoload.php');
    $autoload = new Autoload();
    $autoload->init();

    $authenticate = new Authenticate();
    $authenticate->auth();

    $controller = new Controller();
    $controller->init();