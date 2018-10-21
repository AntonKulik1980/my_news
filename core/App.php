<?php

class App
{

    // protected $result = null;

    public function __construct()
    {
        // Запускаем сессию
        Session::init();
        // 
        ob_start();
    }

    public function init()
    {
        Router::load(CONFIG.'routes.php')
            ->directPath(Request::uri(), Request::method());
    }
}
