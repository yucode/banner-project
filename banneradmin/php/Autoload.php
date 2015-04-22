<?php
class Autoload {
    public function init()
    {
        spl_autoload_register(array($this, '_autoload'));
    }

    private function _autoload($classname)
    {
        $file = str_replace('\\', '/', $classname);
        $filepath = __DIR__ . "/" . $file . '.php';
        if (is_readable($filepath))
        {
            require_once($filepath);
        }
    }
}