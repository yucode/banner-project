<?php

class Database
{
//    const DB_HOST = 'mysql.hostinger.com.ua';
    const DB_HOST = 'localhost';
    const DB_USERNAME = 'u744243076_banad';
    const DB_PASSWORD = 'banadbanad';
    const DB_NAME = 'u744243076_banad';

    public function connect()
    {
        $connect = new mysqli(self::DB_HOST, self::DB_USERNAME, self::DB_PASSWORD, self::DB_NAME );

        if (mysqli_connect_errno())
        {
            printf("Connection failed: %s", mysqli_connect_error());
            die();
        }
        return $connect;
    }
}