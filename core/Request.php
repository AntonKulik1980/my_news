<?php

class Request
{
	
    public static function uri()
	{
		if (isset($_SERVER["REQUEST_URI"]) and !empty($_SERVER["REQUEST_URI"]))
            return trim($_SERVER["REQUEST_URI"], '/');
	}
    
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

}