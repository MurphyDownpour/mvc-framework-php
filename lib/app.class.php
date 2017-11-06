<?php
    require_once "view.class.php";
    require_once "db.class.php";
    class App
    {
        protected static $router;
        public static $db;


        public static function getRouter()
        {
            return self::$router;
        }
        public static function run($controllerObject, $controllerMethod, $controllerName, $param = '')
        {
            self::$db = new DB(Config::get('db.host'), Config::get('db.user'), Config::get('db.password'), Config::get('db.db_name'));
            Router::setParam($param);
            if (method_exists($controllerObject, $controllerMethod))
            {
                $view_path = $controllerObject->$controllerMethod();
                $view_object = new View($controllerObject->getData(), $view_path, $controllerName, $controllerMethod);
                $content = $view_object->render();
            } else
            {
                throw new Exception("Method doesn't not exists.");
            }
            $layout = 'default';
            $layout_path = ROOT.DS.'mvc'.DS.'views'.DS.$layout.'.html';
            $layout_view_object = new View(compact('content'), $layout_path);
            echo $layout_view_object->render();
        }
    }