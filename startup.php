<?php

/*
*   SETUP
 * */

define('path',__DIR__);


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
try{
    \Neoan3\Apps\Db::setEnvironment([
        'host' => getenv('DB_HOST'),
        'name' => getenv('DB_NAME'),
        'user' => getenv('DB_USER'),
        'password' => getenv('DB_PASSWORD')
    ]);
} catch (\Neoan3\Apps\DbException $e){
    die('Database issue');
}