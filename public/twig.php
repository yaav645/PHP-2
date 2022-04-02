<?php

include "../vendor/autoload.php";

$loader = new \Twig\Loader\FilesystemLoader('../templates');
/*----------Подключаем LOADER--------------*/
$twig = new \Twig\Environment($loader);
/*----------Подключаем LOADER с кешированием, не включать на период разработки, иначе будет кэшировать--------------
$twig = new \Twig\Environment($loader, [
    'cache' => '/path/to/compilation_cache',
]);
*/
echo $twig->render('index.twig', ['name' => 'Fabien']);