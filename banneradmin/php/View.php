<?php

class View
{
    public $banners;
    public $pages;
    public $page;
    public $data;

    public function __construct($banners, $pages, $data)
    {
        $this->banners = $banners;
        $this->pages = $pages;
        $this->data = $data;
    }
    public function addContent($name)
    {
        $this->render('pages/' . $name . '.php');
    }

    private function render($file)
    {
        require($file);
    }
}