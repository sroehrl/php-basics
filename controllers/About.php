<?php


namespace Controller;


use Neoan3\Apps\Template;

class About extends Controller
{
    function __construct()
    {
        $this->view = Template::embraceFromFile('views/about.html',[]);
    }

}