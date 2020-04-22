<?php


namespace Models;


class Posts
{
    function getAll()
    {
        return [
          ['title' => 'Post 1', 'content' => 'This is content 1'],
          ['title' => 'Post 2', 'content' => 'This is content 2'],
          ['title' => 'Post 3', 'content' => 'This is content 3'],
        ];
    }
    function get($id)
    {

    }

}