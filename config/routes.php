<?php
    require_once ROOT.DS.'mvc'.DS.'lib'.DS.'router.class.php';
    $router = new Router;
    $router->define([
        '' => 'home.controller.php+index',
        'home/index' => 'home.controller.php+index',
        'blog/index' => 'blog.controller.php+index',
        'about/index' => 'about.controller.php+index',
        'blog/details/1' => 'blog.controller.php+details+$id',
        'blog/details/2' => 'blog.controller.php+details+$id',
        'blog/details/3' => 'blog.controller.php+details+$id'
    ]);