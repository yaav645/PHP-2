<?php
session_start();
use app\engine\Autoload;
use app\models\{Goods, Users, News, Basket};
use app\engine\Render;
use app\engine\TwigRender;
use app\controllers\AuthController;
use app\engine\Request;

/* ---------- Подключаем автозагрузчик -----------------------------*/
//include dirname(__DIR__) . "/engine/Autoload.php";
include dirname(__DIR__) . "/config/config.php";

/* ---------- Подключаем автозагрузчик VENDOR -----------------------------*/
include "../vendor/autoload.php";

/* ---------- Регистрируем автозагрузчик -----------------------------*/
spl_autoload_register([new Autoload(), 'loadClass']);

try {

    /* ---------- Подключаем авторизацию -----------------------------*/
    $authController = new AuthController(new Render());
    $authController->login();

    /* ---------- Работа с контроллером -----------------------------*/
    $request = new Request();

    $controllerName = $request->getControllerName() ?? 'index';
    if (empty($controllerName)) $controllerName = 'index';
    $actionName = $request->getActionName() ?? null;
    $controllerName = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

    if (class_exists($controllerName)) {
        $goodsController = new $controllerName(new Render());
        $goodsController->runAction($actionName);
    } else {
        echo "Нет такого контроллера";
    }

    /* ---------- Реализация метода GETONE, GETALL-----------------------------
    $goods = new Basket();
    $goods = $goods->getOne(77);
    var_dump($goods);
    die;

    */

    /* ---------- Реализация метода INSERT-----------------------------
    $goods = new Goods("Автомобиль","гоночный", 25000);
    $goods->insert();
    */

    /* ---------- Реализация метода DELETE-----------------------------
    $id = 49;
    $goods = new Goods();
    $goods = $goods->getOne($id);
    var_dump(get_class_methods($goods));
    var_dump($goods);
    $a = $goods->delete();
    var_dump('Удалено число строк', $a);
    */

    /* ---------- Реализация метода UPDATE-----------------------------
    $goods = new Goods();
    $goods = $goods->getOne(46);
    $goods->description = 'Гоночный';
    $goods->update();
    var_dump($goods);
    */

    /* ---------- Реализация метода SAVE-----------------------------
    $goods = new Goods();
    $goods = $goods->getOne(48);
    $goods->price = 25;

    //$goods = new Goods("Стул","Деревяный на четырех ножках", 40);
    $goods->save();
    var_dump($goods);
    */

}
catch (Exception $e) {
   echo $e;
}