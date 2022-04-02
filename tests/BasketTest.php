<?php

namespace app\tests;

use app\models\entities\Basket;
use PHPUnit\Framework\TestCase;

class BasketTest extends TestCase
{
    public function testBasketConstructor()
    {
        $goods_id = 3;
        $quantity = 1;
        $basket = new Basket($goods_id, $quantity);

        $this->assertEquals($goods_id, $basket->goods_id);
        $this->assertEquals($quantity, $basket->quantity);
    }

    public function testBasketProps()
    {
        $goods_id = 3;
        $quantity = 1;
        $basket = new Basket($goods_id, $quantity);

        $this->assertArrayHasKey('goods_id', $basket->props);
        $this->assertArrayHasKey('quantity', $basket->props);
        $this->assertArrayHasKey('session_id', $basket->props);

        $this->assertEquals(false, $basket->props['goods_id']);
        $this->assertEquals(false, $basket->props['quantity']);
        $this->assertEquals(false, $basket->props['session_id']);
    }
}