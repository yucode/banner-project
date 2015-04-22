<?php
use gateway\Banner as Banner;
use gateway\Page as Page;

class Controller
{

    public function init()
    {
        $editedData = null;
        if (!empty($_GET['page']))
        {
            switch ($_GET['page'])
            {
                case 'Delete':
                    $this->delete();
                    break;
                case 'Edit':
                    $editedData = $this->edit();
                    break;
            }
        }
        else
        {
            $_GET['page'] = 'Admin';
        }

        $bannerGateway = new Banner();
        $pageGateway = new Page();
        $pages = $pageGateway->getPages();
        $banners = $bannerGateway->getBanners($_SESSION['id']);
        $view = new View($banners, $pages, $editedData);
        $view->addContent($view->page = $_GET['page']);
    }

    private function delete()
    {
        if (!empty($_GET['id']))
        {
            $banner = new Banner();
            $banner->deleteBanner($_GET['id']);
        }
        header("location: index.php");
    }

    private function edit()
    {
        $id = '';
        $banner = new Banner();
        if (!empty($_GET['id']))
        {
            $id = $_GET['id'];
            $data = $banner->getBanner($id);
        }
        else
        {
            $data = [
                'title' => '',
                'code'=>'',
                'page' => '',
                'switch' => 1,
                'views' => 0,
                'start' => '0000-00-00 00:00:00',
                'end' => '0000-00-00 00:00:00',
                'pages'=>[]
            ];
        }
        if (!empty($_POST))
        {
            $banner->saveBanner($id);
            header("location: index.php");
        }
        return $data;
    }

}