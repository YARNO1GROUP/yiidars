<?php

namespace frontend\models;

use common\models\User;
use yii\db\ActiveRecord;

class Post extends ActiveRecord
{
    public static function tableName()
    {
        return 'post';
    }

    public function getAuthor(){

        return $this->hasOne(User::class, ['id' => 'author_id']);
    }

    public function getCategory(){
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public static function getNumber()
    {
        return 123;
    }

}