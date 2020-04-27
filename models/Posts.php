<?php


namespace Models;


use Neoan3\Apps\Db;

class Posts implements Model
{
    public $postId;
    function __construct($keyValues)
    {
        $this->postId = Db::ask('post',$keyValues);
    }

    static function find($condition=[])
    {
        return Db::easy('post.*', $condition);
    }
    static function create($post)
    {
        return Db::ask('post',$post);
    }


}