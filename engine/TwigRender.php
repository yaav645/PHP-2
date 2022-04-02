<?php

namespace app\engine;

use app\Interfaces\IRender;

class TwigRender implements IRender
{
    private $twig;

    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader('../templates');
        $this->twig = new \Twig\Environment($loader);
    }


    public function renderTemplate($template, $params = [])
    {
        return $this->twig->render($template . ".twig", $params);
    }
}