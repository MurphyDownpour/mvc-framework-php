<?php
require_once ROOT.DS.'mvc'.DS.'lib'.DS.'config.class.php';

Config::set('site_name', 'MVC');
Config::set('languages', array('en', 'fr'));
Config::set('routes', array(
    'default' => '',
    'admin'   => 'admin'
));
Config::set('default_route', 'default');
Config::set('default_controller', 'home');
Config::set('default_action', 'index');
Config::set('db.host', 'localhost');
Config::set('db.user', 'root');
Config::set('db.password', '');
Config::set('db.db_name', 'mvc');
