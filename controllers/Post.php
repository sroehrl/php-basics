<?php


namespace Controllers;


use Models\Posts;
use Neoan3\Apps\DbException;

class Post extends Controller
{
   function postPost($payload)
   {
       $answer = ['success' => false, 'post' => []];
       if(!$user = retrieveSession('user')){
           return $answer;
       }

       try{
           $payload['user_id'] = $user['id'];
           $id = Posts::create($payload);
       } catch (DbException $e){
           return ['success'=> false];
       }
       $payload['id'] = $id;
       return $answer;

   }

}