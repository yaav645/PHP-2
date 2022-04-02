<?php

namespace app\models\repositories;

use app\engine\Session;
use app\models\entities\Users;
use app\models\Repository;

class UsersRepository extends Repository
{
    protected function getTableName()
    {
        return 'users';
    }

    protected function getEntityClass()
    {
        return Users::class;
    }

    Public function getUser() {
        return (new Session())->get('login');
    }

    public function isAuth() {
        if (isset($_COOKIE['hash'])) {
            $hash = $_COOKIE['hash'];

            $row = $this->getWhere('hash', $hash);
            if (!empty($row)) {
                (new Session())->set('id', $row->id);
                (new Session())->set('login', $row->login);
            }
        }
        return isset($_SESSION['login']);
    }

    public function auth($login, $password) {

        $row = $this->getWhere('login', $login);
        if ($row) {
            if (password_verify($password, $row->pass)) {
                (new Session())->set('id', $row->id);
                (new Session())->set('login', $login);
                return true;
            }
        }
        return false;
    }



}
