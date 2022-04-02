<?php

namespace app\controllers;

use app\engine\Request;
use app\models\entities\Goods;
use app\models\repositories\GoodsRepository;

class GoodsController extends Controller
{
    protected $defaultActionName = 'catalog';

    public function catalog()
    {
        $page = (new Request())->getParams()['page'] ?? $page = 1;
        $catalog = new Goods();
        $catalog = (new GoodsRepository())->getLimit($page*2);
        $templates = 'goods/catalog';
        $params = [
            'menu' => 'menu/menu',
            'layout' => 'layouts/layout',
            'catalog' => $catalog,
            'title' => 'Каталог',
            'page' => ++$page,
        ];
        echo $this->render($templates, $params);
    }

    public function show()
    {
        $id = (new Request())->getParams()['id'];
        $product = new Goods();
        $product = (new GoodsRepository())->getOne($id);
        $templates = 'goods/show';
        $params = [
            'menu' => 'menu/back',
            'layout' => 'layouts/layout',
            'product' => $product,
            'title' => 'Карточка товара',
        ];
        echo $this->render($templates, $params);
    }

    public function add()
    {
        echo "ADD";
    }



}