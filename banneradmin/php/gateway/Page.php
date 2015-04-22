<?php


namespace gateway;
use \Database as Database;

class Page
{
    public function getPages()
    {
        $db = new Database();
        $mysqli = $db->connect();
        $result = $mysqli->query("SELECT * FROM page");
        $pages = [];
        while ($row = $result->fetch_assoc())
        {
            $pages[] = $row;
        }
        $mysqli->close();
        return $pages;
    }
}