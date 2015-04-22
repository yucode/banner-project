<?php

namespace gateway;
use \Database as Database;
class User
{
    public function auth()
    {
        if(empty($_SERVER['PHP_AUTH_USER']))
        {
            $this->startAuth();
        }
        $db = new Database();
        $mysqli = $db->connect();
        $login = $mysqli->real_escape_string($_SERVER['PHP_AUTH_USER']);
        $password = $mysqli->real_escape_string($_SERVER['PHP_AUTH_PW']);
        $result = $mysqli->query("SELECT id, password FROM user WHERE username = '$login'");
        $user = $result->fetch_assoc();
        // Если такого пользователя нет - создаем
        if(empty($user))
        {
            $mysqli->query("INSERT INTO user (username, password) VALUES ('$login', '$password')");
            $user['id'] = $mysqli->insert_id;
        }
        // если не совпал пароль - заново
        else if ($user['password'] !== $password)
        {
            $this->startAuth();
        }
//        $result = $mysqli->query("SELECT id FROM user WHERE username = '$login'");
//        $user = $result->fetch_assoc();
        $_SESSION['id'] = $user['id'];
        $mysqli->close();
    }

    private function startAuth()
    {
        header('WWW-Authenticate: Basic relam="BannerAdmin"');
        header('HTTP/1.0 401 Unauth');
        die();
    }
}