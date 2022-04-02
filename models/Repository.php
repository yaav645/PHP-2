<?php

namespace app\models;

use app\engine\Db;

abstract class Repository
{
    abstract protected function getTableName();
    abstract protected function getEntityClass();

    public function getOne($id)
    {
        $params = [
            'id' => $id
        ];
        $tableName = $this->getTableName();
//        $sql = "ОШИБКА В SQL запросе Repository.php строка 18";    //     SQL запрос с ошибкой
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";    //      SQL запрос рабочий
//        return Db::getInstance()->queryOne($sql, $params);
        return Db::getInstance()->queryOneObject($sql, $params, $this->getEntityClass());
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->getTableName()}";
//        return Db::getInstance()->queryAll($sql);
        return Db::getInstance()->queryAllObject($sql, $this->getEntityClass());
    }

    public function getLimit($page)
    {
        $sql = "SELECT * FROM {$this->getTableName()} LIMIT 0, :page";
        return Db::getInstance()->queryLimitObject($sql, $page, $this->getEntityClass());
    }

    /* ---------------------Метод INSERT----------------------------*/
    public function insert(Entity $entity) {
        $arrayNames = [];
        foreach ($entity->props as $key => $value) {
            $arrayNames[] = $key;
            $params[$key] = $entity->$key;
        }
        //---------------- name, description, price, likes
        $columnNames = implode(", ", $arrayNames);
        //---------------- :name, :description, :price, :likes
        $columnPlaceholders = ":" . implode(", :", $arrayNames);
        $sql = "INSERT INTO {$this->getTableName()}({$columnNames}) VALUES ({$columnPlaceholders})";
        $result = Db::getInstance()->execute($sql, $params);

        $entity->id = Db::getInstance()->getLastInsertId();
        return $this;
    }

    public function update(Entity $entity)
    {
        $updateString = null;
        foreach ($entity->props as $key => $value) {
            if ($entity->props[$key] === true) {
                $params[$key] = $entity->$key;
                $updateString = $updateString . $key . " = :" . $key . ", ";
                $entity->props[$key] = false;
            }
        }
        $updateString = substr_replace($updateString, "", -2);
        //---------------- UPDATE goods SET name = :name, description = :description WHERE id = 5
        $params['id'] = $entity->id;
        $sql = "UPDATE {$this->getTableName()} SET $updateString WHERE id = :id";
        $result = Db::getInstance()->execute($sql, $params);

        return $this;
    }

    public function save(Entity $entity)
    {
        if (isset($entity->id)) $this->update($entity);
        else $this->insert($entity);
    }

    /* ---------------------Метод DELETE----------------------------*/
    public function delete(Entity $entity)
    {
        $params = [
            'id' => $entity->id
        ];
        $sql = "DELETE FROM {$this->getTableName()} WHERE id = :id";
        return Db::getInstance()->execute($sql, $params);
    }

    public function getWhere($name, $value)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE {$name} = :value";
        $params = [':value' => $value];
        return Db::getInstance()->queryAllObject($sql, $params, $this->getEntityClass());
    }

    public function getWhereAND($name, $value, $name2, $value2)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE {$name} = :value";
        $sql = $sql . " AND " . "{$name2} = :value2";
        $params = [
            ':value' => $value,
            ':value2' => $value2,
            ];
        return Db::getInstance()->queryAllObject($sql, $params, $this->getEntityClass());
    }

    public function getCountWhere($name, $value)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT count(id) as count FROM {$tableName} WHERE {$name} = :value";
        return Db::getInstance()->queryOne($sql, [':value' => $value])['count'];
    }



}