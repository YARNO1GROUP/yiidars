<?php

namespace frontend\controllers;

use frontend\models\Person2;
use yii\db\Query;
use yii\web\Controller;

class Person2Controller extends Controller
{
    public function actionAdd(){

       Person2::updateAll(['phone' => '2223344'], ['phone' => '1234567']);

    }

    public function actionIndex()
    {
        $data = (new Query())
            ->select([
                'c.name', 'u.username', 'post.category_id',
                'post.id', 'post.title', 'post.body', 'post.author_id',
                'post.created_at', 'post.updated_at'
            ])
            ->from('post')
            ->leftJoin( 'category as c', 'c.name = post.category_id')
            ->leftJoin('user as u', 'u.name = post.author_id')
            ->limit(10)
            ->all();


        return $this->render('index', ['data' => $data]);
    }

}