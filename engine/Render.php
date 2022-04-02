<?php

namespace app\engine;

use app\Interfaces\IRender;

class Render implements IRender
{
    public function renderTemplate($template, $params = [])
    {
        extract($params);
        ob_start();
        $path = VIEWS_DIR . $template . ".php";
        include $path;
        return ob_get_clean();
    }
}