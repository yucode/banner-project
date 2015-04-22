<?php

class Controller
{
    public function init()
    {
        $this->createView();
    }

    private function createView()
    {
        $view = new View();
        if (!empty($_GET['page']))
        {
            $view->addContent($view->page = $_GET['page']);
        }
        else
        {
            $view->addContent($view->page = 'Home');
        }
    }
}