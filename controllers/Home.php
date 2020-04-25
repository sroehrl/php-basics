<?php


namespace Controllers;


use Models\Posts;
use Neoan3\Apps\Template;

class Home extends Controller
{
    function __construct()
    {
        $this->view = Template::embraceFromFile('/views/home.html', [
            'posts' => Posts::find()
        ]);
    }
    function getPosts()
    {
        return json_encode(Posts::find());
    }

}