<?php

namespace app\Interfaces;

interface IRender
{
    public function renderTemplate($template, $params = []);

}