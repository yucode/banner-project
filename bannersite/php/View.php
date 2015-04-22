<?php

class View
{
    public $page;

    public function addContent($name)
    {

        $this->render('pages/' . $name . '.php');
    }

    private function render($file)
    {
        require($file);
    }

    public function addCurrentClass($name)
    {
        if ($name == $this->page)
        {
            return 'class="current"';
        }
        return '';
    }
}