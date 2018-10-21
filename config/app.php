<?php
  
    define('ROOT', realpath(__DIR__.'/../'));
    define('VIEWS', ROOT.'/views/');
    define('CONTROLLERS', ROOT.'/controllers/');
    define('MODELS', ROOT.'/models/');
    define('CONFIG', ROOT.'/config/');
    define('CORE', ROOT.'/core/');

    define('EXT', '.php');
    define('APPNAME', 'My News');
    define('SLOGAN', 'News Site!');

    define('DB', ROOT.'/db/');
    define('DB_CONFIG_FILE', CONFIG.'db.php');
    define('LOGS', ROOT.'/logs/');
    define('SESSION_PREFIX', 'shop_');

    define('DOMAIN', 'http://127.0.0.1:8000');
    define('FRONT_MAXPAGE', 3);
    define('ADMIN_MAXPAGE', 10);