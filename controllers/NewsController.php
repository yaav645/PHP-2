<?php

namespace app\controllers;

use app\models\entities\News;
use app\engine\Request;
use app\models\repositories\NewsRepository;

class NewsController extends Controller
{
    public function news()
    {
        $page = (new Request())->getParams()['page'] ?? $page = 1;
        $news = new News();
        $news = (new NewsRepository())->getLimit($page*2);
        $templates = 'news/news';
        $params = [
            'menu' => 'menu/menu',
            'layout' => 'layouts/layout',
            'news' => $news,
            'title' => 'Новости',
            'page' => ++$page
        ];
        echo $this->render($templates, $params);
    }

    public function show()
    {
        $id = (new Request())->getParams()['id'];
        $news = new News();
        $news = (new NewsRepository())->getOne($id);
        $templates = 'news/show';
        $params = [
            'menu' => 'menu/back',
            'layout' => 'layouts/layout',
            'news' => $news,
            'title' => 'Новости',
        ];
        echo $this->render($templates, $params);
    }
}