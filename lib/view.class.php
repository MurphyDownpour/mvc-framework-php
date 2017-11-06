<?php
    class View
    {
        protected $data;
        protected $path;

        protected static function getDefaultViewPath($controllerName, $controllerMethod)
        {
            $controller_dir = $controllerName;
            $template_name = $controllerMethod.'.html';
            return ROOT.DS.'mvc'.DS.'views'.DS.$controller_dir.DS.$template_name;
        }
        public function __construct($data = array(), $path = null, $controllerName = '', $controllerMethod = '')
        {
            if (!$path)
            {
                $path = self::getDefaultViewPath($controllerName, $controllerMethod);
            }
            if (!file_exists($path))
            {
                throw new Exception("View doesn't exists");
            }

            $this->path = $path;
            $this->data = $data;
        }

        public function render()
        {
            $data = $this->data;
            ob_start();
            include($this->path);
            $content = ob_get_clean();

            return $content;
        }
    }