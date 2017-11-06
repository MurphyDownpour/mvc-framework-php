<?php
    define('DS', DIRECTORY_SEPARATOR);
    define('ROOT', dirname(dirname(__FILE__)));
    define('VIEWS_PATH', ROOT.DS.'views');

    require_once "lib/router.class.php";
    require_once "config/config.php";
    require_once "lib/app.class.php";
    $uri = trim($_SERVER['REQUEST_URI'], '/');

    if (isset(explode('/', $uri)[2]))
    {
        $param = explode('/', $uri)[2];
//        Router::define([
//           $uri => explode('+', Router::load('config/routes.php')->direct($uri)[0])
//        ]);
    }
    $controllerPathAndMethodName = Router::load('config/routes.php')->direct($uri);
    $controllerFile = explode(".", $controllerPathAndMethodName[0]);
    $controllerClass = ucfirst($controllerFile[0]) . 'Controller';
    $controllerName = $controllerFile[0];
    $controllerPath = 'controllers'.DS.$controllerPathAndMethodName[0];
    $methodName = $controllerPathAndMethodName[1];
    require_once $controllerPath;
    $controllerObject = new $controllerClass();
    App::run($controllerObject, $methodName, $controllerName, $param);