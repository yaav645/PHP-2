<?php

namespace app\models;

use app\Interfaces\IModel;
use app\engine\Db;

abstract class Entity
{
    protected $props = [];

    public function __set($name, $value)
    {

        if(isset($this->$name)) {
            $this->$name = $value;
            $this->props[$name] = true;

        }
  //      else
  //          die("Ошибка, нет такого поля");
    }
    public function __get($name)
    {
        return $this->$name;
    }

    public function  __isset($name)
    {
        return isset($this->$name);
    }

}
