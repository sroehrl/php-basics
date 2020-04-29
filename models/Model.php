<?php
namespace Models;

interface Model{
    static function find();
    static function byId($id);
}