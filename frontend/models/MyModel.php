<?php

namespace frontend\models;

use yii\base\Model;

class MyModel extends Model
{
    public $firstname;
    public $lastname;
    public $birthday;
    public $phone;

    public function rules(){

        return [
                [['firstname', 'lastname', 'birthday', 'phone'], 'required'],
                ['firstname', 'string'],
                ['lastname', 'string'],
                ['birthday', 'string'],
                ['phone', 'integer']
        ];
    }

}