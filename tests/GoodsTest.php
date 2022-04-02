<?php

namespace app\tests;


use app\models\entities\Goods;
use PHPUnit\Framework\TestCase;

class GoodsTest extends TestCase
{
    public function testGoodsConstructor()
    {
        $name = 'Фломастеры';
        $description = 'Разноцветные с колпачком';
        $price = 125;
        $goods = new Goods($name, $description, $price);

        $this->assertEquals($name, $goods->name);
        $this->assertEquals($description, $goods->description);
        $this->assertEquals($price, $goods->price);
    }

    public function testGoodsProps()
    {
        $name = 'Фломастеры';
        $description = 'Разноцветные с колпачком';
        $price = 125;
        $goods = new Goods($name, $description, $price);

        $this->assertArrayHasKey('name', $goods->props);
        $this->assertArrayHasKey('description', $goods->props);
        $this->assertArrayHasKey('price', $goods->props);

        $this->assertEquals(false, $goods->props['name']);
        $this->assertEquals(false, $goods->props['description']);
        $this->assertEquals(false, $goods->props['price']);
    }
}