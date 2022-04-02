<?php

namespace app\engine;

class Autoload
{
    public function loadClass($className) {

            $fileName = "{$className}";
            $fileName = str_replace("app\\", ROOT . DS, $fileName);
            $fileName = str_replace("\\", DS, $fileName) . ".php";
            if (file_exists($fileName)) {
                include $fileName;
            }
    }
}