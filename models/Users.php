<?php


namespace Models;


use Neoan3\Apps\Db;

class Users implements Model
{
    public $userId;
    function __construct($newUser)
    {
        $this->userId = Db::ask('user',[
            'user_name' => $newUser['user_name'],
            'password' => '=' . password_hash($newUser['password'], PASSWORD_DEFAULT)
        ]);
    }
    static function login($userName, $password)
    {
        $response = false;
        $user = Db::easy('user.*',[
            'user_name' => $userName,
            '^delete_date'
        ]);
        if(!empty($user) && password_verify($password, $user[0]['password'])){
            unset($user[0]['password']);
            $response = $user[0];
        }
        return $response;
    }

    static function find($condition=[])
    {
        return Db::easy('user.*',$condition);
    }

}