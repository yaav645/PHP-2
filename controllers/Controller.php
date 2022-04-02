<?php

namespace app\controllers;


use app\Interfaces\IRender;
use app\models\repositories\BasketRepository;

abstract class Controller
{

    protected $action;
    protected $defaultActionName;
    protected $render;

    public function __construct(IRender $render)
    {
        $this->render = $render;
    }

    public function runAction($actionName = null)
    {
        $this->action = $actionName ?? $this->defaultActionName;
        $method = $this->action;
        if (method_exists($this, $method)) $this->$method(); else echo "Такого метода не существует";
    }

    public function render($template, $params = [])
    {
        $session_id = session_id();
        $session = $_SESSION['login'] ?? null;
        $render = $this->renderTemplate($params['layout'],
            [
            'menu' => $this->renderTemplate($params['menu'],
                ['count' => (new BasketRepository())->getCountWhere('session_id', $session_id)]),
            'content' => $this->renderTemplate($template, $params),
            'title' => $params['title'],
            'login' => $session
            ]);
        return $render;
    }

    public function renderTemplate($template, $params = [])
    {
        $result = $this->render->renderTemplate($template, $params);
        return $result;
    }

}