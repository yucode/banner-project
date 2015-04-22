<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    require_once('Autoload.php');

    $autoload = new Autoload();
    $autoload->init();

    $controller = new Controller();
    $controller->init();