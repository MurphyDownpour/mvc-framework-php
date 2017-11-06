<?php
    class Router
    {
        protected static $route;
        protected $controller;
        protected $method;
        protected static $param;

        public static function load($file)
        {
            $router = new static;

            require_once $file;
            return $router;
        }

        public static function define($routes)
        {
            self::$route = $routes;
        }

        public function direct($uri)
        {
            if (array_key_exists($uri, self::$route))
            {
                var_dump(self::$route[$uri]);
                $controllerAndAction = explode("+", self::$route[$uri]);
                $controller = explode(".", $controllerAndAction[0])[0];
                $method = $controllerAndAction[1];
                $this->controller = $controller;
                $this->method = $method;
                return $controllerAndAction;
            }
            throw new Exception("No route defined for this URI.");
        }

        public function getController()
        {
            return $this->controller;
        }

        public function getMethod()
        {
            return $this->method;
        }

        public static function getParam()
        {
            return self::$param;
        }

        public static function setParam($param)
        {
            self::$param = $param;
        }
    }