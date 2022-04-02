<?php

namespace app\controllers;

use app\engine\Session;
use app\models\entities\Basket;
use app\engine\Request;
use app\models\repositories\BasketRepository;

class BasketController extends Controller
{
    protected $defaultActionName = 'basket';

    public function basket()
    {
        $session_id = (new Session())->getId();
        $basket = new Basket();
        $basket = (new BasketRepository())->getAllBasket($session_id);
        $templates = 'goods/basket';
        $params = [
            'menu' => 'menu/menu',
            'layout' => 'layouts/layout',
            'basket' => $basket,
            'title' => 'Корзина',

        ];
        echo $this->render($templates, $params);
    }
    public function add()
    {

        $session_id = (new Session())->getId();
        $goods_id = (new Request())->getParams()['id'];
        $quantity = 1;

        $basket = new Basket();
        $basket = (new BasketRepository())->getWhereAND('session_id', $session_id, 'goods_id', $goods_id);
        if ($basket) {
            $basket = (new BasketRepository())->addQuantity($basket);
            (new BasketRepository())->save($basket);
        }
        else {
            $add_goods = new Basket($goods_id, $quantity, $session_id);
            (new BasketRepository())->save($add_goods);
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    public function addAjax()
    {
        $basket = new Basket();
        $session_id = (new Session())->getId();
        $goods_id = (new Request())->getParams()['id'];
        $quantity = 1;
        $basket = (new BasketRepository())->getWhereAND('session_id', $session_id, 'goods_id', $goods_id);
        if ($basket) {
            $basket = (new BasketRepository())->addQuantity($basket);
            (new BasketRepository())->save($basket);
        }
        else {
            $add_goods = new Basket($goods_id, $quantity, $session_id);
            (new BasketRepository())->save($add_goods);
        }
        $response = [
            'status' => 'ok',
            'quantity' => $basket->quantity
        ];
        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        die();
    }

    public function delete()
    {
        $session_id = (new Session())->getId();
        $goods_id = (new Request())->getParams()['id'];
        $basket = new Basket();
        $basket = (new BasketRepository())->getWhereAND('session_id', $session_id, 'goods_id', $goods_id);
        if ($basket->quantity == 1)
            {
                (new BasketRepository())->delete($basket);
                $response = [
                    'status' => 'ok',
                    'quantity' => $basket->quantity
                ];
                echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                die();
            }
        else
            {
                $basket = (new BasketRepository())->reduceQuantity($basket);
                (new BasketRepository())->save($basket);
                $response = [
                    'status' => 'ok',
                    'quantity' => $basket->quantity
                ];
                echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
                die();
            }
    }
}