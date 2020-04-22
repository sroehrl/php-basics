<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

require_once 'vendor/autoload.php';

use Neoan3\Apps\Template;

define('path',__DIR__);

$title = 'Homepage';

if(isset($_GET['route'])){
    $class = '\\Controller\\'.ucfirst($_GET['route']);
    $currentRoute = new $class();
    $title = 'My project - ' . ucfirst($_GET['route']);
} else {
    $currentRoute = new \Controller\Home();
}

// which controller?
$base = 'http://localhost/php-basics/';
$substitutions = [
    'title' => $title,
    'base' => $base,
    'navs' => [
        [
            'href' => $base .'index.php?route=about',
            'title' => 'About'
        ]
    ],
    'content' => $currentRoute->view
];


echo Template::embraceFromFile('/views/main.html',$substitutions);


