<?php

namespace app\controllers;

class IndexController extends Controller
{

    protected $defaultActionName = 'index';

    public function runAction($actionName = null)
    {
        $this->action = $actionName ?: $this->defaultActionName;
        $method = $this->action;
        if (method_exists($this, $method)) $this->$method(); else echo "Такого метода не существкет";
    }

    public function index()
    {

        $templates = 'index';
        $params = [
            'menu' => 'menu/menu',
            'layout' => 'layouts/layout',
            'title' => 'Главная',
        ];
        echo $this->render($templates, $params);
    }

}

