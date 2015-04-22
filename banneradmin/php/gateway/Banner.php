<?php

namespace gateway;
use \Database as Database;
class Banner
{
    public function getBanners($authorId)
    {
        $db = new Database();
        $mysqli = $db->connect();
        $searchQuery = '';
        if (!empty($_GET['search']))
        {
            $search = $mysqli->real_escape_string($_GET['search']);
            $searchQuery = "AND title LIKE '%{$search}%'";
        }
        $result = $mysqli->query("SELECT * FROM banner WHERE author_id = '$authorId' $searchQuery");
        if (empty($result))
        {
            return [];
        }
        $banners = [];
        while ($row = $result->fetch_assoc())
        {
            $banners[] = $row;
        }
        $mysqli->close();
        return $banners;
    }

    public function getBanner($id)
    {
        $db = new Database();
        $mysqli = $db->connect();
        $result = $mysqli->query("SELECT * FROM banner WHERE id = '$id'");
        $banner = $result->fetch_assoc();
        if ($result = $mysqli->query("SELECT * FROM link WHERE banner_id = '$id'"))
        {
            $banner['pages'] = [];
            while ($row = $result->fetch_assoc())
            {
                $banner['pages'][] = $row;
            }
        }
        $mysqli->close();
        return $banner;
    }

    public function getBannerByPage($page, $author)
    {
        $db = new Database();
        $mysqli = $db->connect();
        $page = $mysqli->real_escape_string($page);
        $author = $mysqli->real_escape_string($author);

        //выбираем нужную страницу
        if (!$result = $mysqli->query("SELECT * FROM page WHERE url = '$page'"))
        {
            return false;
        }

        $row = $result->fetch_assoc();
        //выбираем id баннеров, установленные на страницу
        if (!$result = $mysqli->query("SELECT banner_id FROM link WHERE page_id = {$row['id']}"))
        {
            return false;
        }
        $ids = [];
        while($row = $result->fetch_assoc())
        {
            $ids[] = $row;
        }
        if (empty($ids))
        {
            return false;
        }
        //перемешиваем id баннеров для рандома
        shuffle($ids);

        $authorQuery = '';
        if (!empty($author))
        {
            $authorQuery .= "AND author_id='$author' ";
        }
        if (isset($_COOKIE['views']))
        {
            $authorQuery .= "AND views<={$_COOKIE['views']} ";
        }
        $now = date('Y-m-d H:i:s');
        $authorQuery .= "AND (start<='$now' OR start IS NULL OR start=0)";
        $authorQuery .= "AND (end>='$now' OR end IS NULL OR end=0) ";
        //выбираем баннеры автора, доступные к показу
        if (!$result = $mysqli->query("SELECT * FROM banner WHERE switch=1 $authorQuery "))
        {
            return false;
        }
        $banners = [];
        while ($row = $result->fetch_assoc())
        {
            $banners[] = $row;
        }
        $mysqli->close();
        //выбираем баннер для страницы, доступный к показу
        foreach($ids as $try)
        {
            foreach($banners as $candidate)
            {
                if ($try['banner_id'] == $candidate["id"])
                {
                    return $candidate['code'];
                }
            }
        }
        return false;
    }

    public function deleteBanner($id)
    {
        $db = new Database();
        $mysqli = $db->connect();
        $mysqli->query("DELETE FROM banner WHERE id = $id");
        $mysqli->query("DELETE FROM link WHERE banner_id = $id");
        $mysqli->close();
    }

    public function saveBanner($id)
    {
        $db = new Database();
        $mysqli = $db->connect();

        if (!empty($_POST))
        {
            $title = $mysqli->real_escape_string($_POST['title']);
            $code = $mysqli->real_escape_string($_POST['code']);
            $views = $mysqli->real_escape_string($_POST['views']);
            $start = strtotime($_POST['start']);
            $start = $start ? date("Y-m-d H:i:s", $start) : '';
            $end = strtotime($_POST['end']);
            $end = $end ? date("Y-m-d H:i:s", $end) : '';
            $author_id = $_SESSION['id'];
            $switch = $_POST['switch'];

            $setQuery = "SET
                            title='$title',
                            code='$code',
                            author_id='$author_id',
                            switch='$switch',
                            views='$views',
                            start='$start',
                            end='$end'
                        ";
            if ($id)
            {
                $mysqli->query("UPDATE banner $setQuery WHERE id=$id");
            }
            else
            {
                $mysqli->query("INSERT INTO banner $setQuery");
                $id = $mysqli->insert_id;
            }

            $mysqli->query("DELETE FROM link WHERE banner_id = $id");

            if (!empty($_POST['multi']))
            {
                foreach ($_POST['multi'] as $key=>$value)
                {
                    if (empty($valuesQuery))
                    {
                        $valuesQuery = 'VALUES ';
                    }
                    else
                    {
                        $valuesQuery .= ", ";
                    }
                    $valuesQuery .= "($value,$id)";
                }
                $mysqli->query("INSERT INTO link (page_id,banner_id) $valuesQuery");
            }
        }
        $mysqli->close();
    }

}