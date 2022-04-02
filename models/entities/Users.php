<?php
namespace app\models\entities;

use app\models\Entity;

class Users extends Entity
{
    protected $id;
    protected $login;
    protected $pass;
    protected $hash;
    protected $hash1;

    protected $props = [
                            'login' => false,
                            'password' => false,
                            'hash' => false
                        ];

    public function __construct($login = null, $password = null, $hash = null)
    {
        $this->login = $login;
        $this->pass = $password;
        $this->hash = $hash;
    }





}