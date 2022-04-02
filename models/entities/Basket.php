<?php

namespace app\models\entities;

use app\models\Entity;

class Basket extends Entity
{
    protected $id;
    protected $basket_id;
    protected $quantity;
    protected $session_id;

    protected $goods_id;
    protected $name;
    protected $description;
    protected $price;
    protected $likes;

    protected $props = [
        'goods_id' => false,
        'quantity' => false,
        'session_id' => false
    ];

    public function __construct($goods_id = null, $quantity = null)
    {
        $this->goods_id = $goods_id;
        $this->quantity = $quantity;
        $this->session_id = session_id();
    }

}