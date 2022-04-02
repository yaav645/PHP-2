<?php

namespace app\engine;

use app\models\Entity;
use app\traits\TSingletone;
use \PDO;

class Db
{
    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'dbname' => 'GB1',
        'login' => 'GB',
        'password' => '123',
        'charset' => 'utf8'
    ];

    use TSingletone;

    private $DBH = null;

    private function getConnection()
    {
        if (is_null($this->DBH)) {
            $this->DBH = new PDO($this->createConnectionString(),
                $this->config['login'],
                $this->config['password']);
            $this->DBH->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        return $this->DBH;
    }

    private function createConnectionString()
    {
        return sprintf("%s:host=%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['dbname'],
            $this->config['charset']
        );
    }

    public function getLastInsertId()
    {
        return $this->DBH->lastInsertId();
    }


/*---------------------------------------------Функции QUERY------------------------------------------------*/
/*---------------------------------------QUERY ассоциативный массив------------------------------------------*/

    private function query($sql, $params = null)
    {
        $this->getConnection();
        $STH = $this->DBH->prepare($sql);
 //       var_dump($STH);
        $STH->execute($params);

        if (!$STH) {
            throw new \Exception("Ошибка в SQL запросе", 404);
        }

        return $STH;
    }

    public function queryOne($sql, $params)
    {
        $STH = $this->query($sql, $params);
        $STH = $STH->fetch();
        return $STH;
    }

    public function queryAll($sql)
    {
        $STH = $this->query($sql);
        $STH = $STH->fetchAll();
        return $STH;
    }

    /*---------------------------------------QUERY объекты------------------------------------------*/

    public function queryOneObject($sql, $params, $class)
    {
        $STH = $this->query($sql, $params);
        $STH->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $class);
        $STH = $STH->fetch();
        return $STH;
    }

    public function queryAllObject($sql, $params, $class)
    {
        $STH = $this->query($sql, $params);
        $STH->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $class);
        $STH = $STH->fetch();
        return $STH;
    }

    /*---------------------------------------QUERY пагинация------------------------------------------*/

    public function queryLimit($sql, $page)
    {
        $this->getConnection();
        $STH = $this->DBH->prepare($sql);
        $STH->bindvalue(':page', $page, PDO::PARAM_INT);
        $STH->execute();
        return $STH;
    }

    public function queryLimitObject($sql, $page, $class)
    {
        $STH = $this->queryLimit($sql, $page);
        $STH->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $class);
        $STH = $STH->fetchAll();
        return $STH;
    }


    public function execute($sql, $params = null)
    {
        $STH = $this->query($sql, $params);
        $STH = $STH->rowCount();
        return $STH;
    }
}