<?php

namespace app\Interfaces;

interface IModel
{
    public function getOne($id);
    public function getAll();
    public static function getTableName();
    public function insert();
    public function update();
    public function delete();
}