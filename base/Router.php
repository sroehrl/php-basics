<?php

namespace Base;

use Neoan3\Apps\Template;

class Router
{
    public $title = 'Homepage';
    public $currentRoute;
    private $skeleton;

    function __construct($htmlSkeleton, $defaultRoute)
    {
        $this->skeleton = $htmlSkeleton;
        $parts = isset($_GET['route']) ? explode('/', $_GET['route']) : [$defaultRoute];
        if ($parts[0] === 'api') {
            $this->apiRoute(ucfirst($parts[1]));
        } else {
            $this->pageRoute(ucfirst($parts[0]));
        }

    }

    function apiRoute($controller)
    {
        $this->constructController($controller);
        // what method
        $method = strtolower($_SERVER['REQUEST_METHOD']) . $controller;
        // retrieve payload
        $payload = [];

        $request =array_merge($_REQUEST, json_decode(file_get_contents('php://input'),true));

        foreach ($request as $key => $value) {
            if ($key !== 'route') {
                $payload[$key] = $value;
            }
        }
        header('Content-Type: application/json');

        $call = $this->currentRoute->$method($payload);
        echo json_encode($call);
        exit();
    }

    function constructController($controller)
    {
        $class = '\\Controllers\\' . $controller;
        $this->currentRoute = new $class();
    }

    function pageRoute($controller)
    {
        $this->constructController($controller);
        $this->title = 'My project - ' . $controller;
    }

    function output($substitutions = [])
    {
        return Template::embraceFromFile($this->skeleton, $substitutions);
    }

}
