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
        $users = [];
        $ids =  Db::easy('post.id', $condition);
        foreach ($ids as $id){
            $users[] = self::byId($id['id']);
        }
        return $users;
    }
    static function create($post)
    {
        return Db::ask('post',$post);
    }
    static function byId($id)
    {
        $post = Db::easy('post.*', ['id'=>$id])[0];
        $post['user'] = Users::byId($post['user_id']);
        return $post;
    }


}