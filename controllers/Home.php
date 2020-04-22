<?php


namespace Controller;


use Models\Posts;
use Neoan3\Apps\Template;

class Home
{
    public $view = '';

    function __construct()
    {
        $this->view = Template::embraceFromFile('/views/home.html', [
            'posts' => $this->getPosts()
        ]);
    }

    function getPosts()
    {
        $posts = new Posts();
        return $posts->getAll();
    }
}