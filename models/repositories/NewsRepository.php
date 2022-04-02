<?php

namespace app\models\repositories;

use app\models\entities\News;
use app\models\Repository;

class NewsRepository extends Repository
{
    protected function getTableName()
    {
        return 'news';
    }

    protected function getEntityClass()
    {
        return News::class;
    }





}
