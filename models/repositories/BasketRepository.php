<?php

namespace app\models\repositories;

use app\engine\Db;
use app\models\entities\Basket;
use app\models\Entity;
use app\models\Repository;

class BasketRepository extends Repository
{
    protected function getTableName()
    {
        return 'basket';
    }

    protected function getEntityClass()
    {
        return Basket::class;
    }

    public function getBasket($session_id)
    {
        $sql = "SELECT goods.id, goods.name, goods.description, goods.price, goods.likes, basket.quantity
                    FROM `goods` INNER JOIN `basket` ON basket.goods_id = goods.id WHERE session_id = '{$session_id}'";
        //     $sql = "SELECT basket.id as basket_id, basket.quantity, goods.id as goods_id, goods.name, goods.description, goods.price, goods.likes
        //                FROM `basket`, `goods` WHERE `session_id` = '{$session_id}' AND basket.goods_id = goods.id";
        return Db::getInstance()->queryAll($sql,[]);
    }

    public function getAllBasket($session_id)
    {
        $sql = "SELECT goods.id, goods.name, goods.description, goods.price, goods.likes, basket.quantity
                    FROM `goods` INNER JOIN `basket` ON basket.goods_id = goods.id WHERE session_id = '{$session_id}'";
        //    $sql = "SELECT basket.id as basket_id, basket.quantity as basket_quantity, goods.likes as goods_likes, goods.id as goods_id, goods.name, goods.description, goods.price
        //               FROM `basket`, `goods` WHERE `session_id` = '{$session_id}' AND basket.goods_id = goods.id";
        return Db::getInstance()->queryAll($sql);
    }

    public function addQuantity(Entity $basket)
    {
        $basket->props['quantity'] = true;
        $basket->quantity = $basket->quantity + 1;
        return $basket;
    }

    public function reduceQuantity(Entity $basket)
    {
        $basket->props['quantity'] = true;
        $basket->quantity = $basket->quantity - 1;
        return $basket;
    }



}