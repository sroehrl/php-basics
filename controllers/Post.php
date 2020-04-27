<?php


namespace Controllers;


use Models\Posts;
use Neoan3\Apps\DbException;

class Post extends Controller
{
   function postPost($payload)
   {
       try{
           $id = Posts::create($payload);
       } catch (DbException $e){
           return ['success'=> false];
       }
       $payload['id'] = $id;
       return ['success' => true, 'post' => $payload];

   }

}