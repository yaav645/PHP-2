<?php

namespace app\controllers;

use app\engine\Session;
use app\models\repositories\UsersRepository;
use app\models\entities\Users;
use app\engine\Request;

class AuthController extends Controller
{
    public function login()
    {
        $auth = false;

        if ((new UsersRepository())->isAuth()) {
            $auth = true;
            $login = (new UsersRepository())->getUser();
        }

        if (isset((new Request())->getParams()['ok'])) {
            $login = strip_tags((new Request())->getParams()['login']);
            $pass = strip_tags((new Request())->getParams()['pass']);

            if ((new UsersRepository())->auth($login, $pass)) {
                if (isset((new Request())->getParams()['save'])) {
                    $hash = uniqid(rand(),true);
                    $id = (new Session())->get('id');

                    $user = new Users();
                    $user = (new UsersRepository())->getOne($id);
                    $user->hash = $hash;
                    (new UsersRepository())->update($user);

     //              $db = @mysqli_connect(HOST, USER, PASS, DB);
     //              $result = mysqli_query($db, "UPDATE users SET `hash` = '{$hash}' WHERE users.id = '{$id}'");
                    setcookie('hash', $hash, time() + 3600, '/');
                }
                header('location: ' . $_SERVER['HTTP_REFERER']);
                die();
            }
            else die('Не верный login или пароль');
        }

        if (!$auth) {
            $templates = 'layouts/auth';
            $params = [
                'menu' => 'menu/menu',
                'layout' => null,
                'title' => 'Авторизация',
                'login' => null
            ];
            echo $this->render($templates, $params);
        }
    }

    public function logout()
    {

            setcookie('hash', '', time() - 3600, '/');
            (new Session())->destroy();
            header("location: " . $_SERVER['HTTP_REFERER']);

    }

}

