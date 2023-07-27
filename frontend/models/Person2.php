<?php

namespace frontend\models;

use yii\db\ActiveRecord;

class Person2 extends ActiveRecord
{
    public static function tableName()
    {

        return 'person';
    }

    public function rules()
    {
        return [
          [['firstname', 'lastname', 'birthday'], 'string'],
          [['firstname', 'lastname', 'birthday', 'phone'], 'required'],
          ['phone', 'integer'],
        ];
    }
}
