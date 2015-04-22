<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    require_once('php/Autoload.php');

    $autoload = new Autoload();
    $autoload->init();

    if (isset($_COOKIE['views']))
    {
        $count = $_COOKIE['views'] + 1;
    }
    else
    {
        $count = 1;
    }

    if (!empty($_GET['page']))
    {
        $bannerGateway = new \gateway\Banner();
        $code = $bannerGateway->getBannerByPage($_GET['page'], $_GET['id']);

        if (isset($_GET['js']))
        {
            setcookie("views", $count, 0x6FFFFFFF);
            echo json_encode(isset($_GET['dummy']) || $code);
        }
        else if ($code)
        {
            echo $code;
        }
        else
        {
            echo '<img src="images/dummy.jpg" width="300" height="240" alt="Ad here" />';
        }
    }