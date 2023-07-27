<?php

namespace frontend\models;

use yii\db\ActiveRecord;
use yii\gii\components\DiffRendererHtmlInline;

class Category extends ActiveRecord
{

    public static function tableName()
    {
        return 'category';
    }

    public function getPosts(){

        return $this->hasMany(Post::class, ['category_id' => 'id']);
    }
}