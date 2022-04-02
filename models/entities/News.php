<?php

namespace app\models\entities;

use app\models\Entity;

class News extends Entity
{
    protected $id;
    protected $title;
    protected $text;

    public function __construct($id = null, $title = null, $text = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->text = $text;
    }


    public function getId()
    {
        return $this->id;
    }

}