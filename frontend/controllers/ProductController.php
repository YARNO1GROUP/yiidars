<?php

namespace frontend\controllers;

use yii\web\Controller;

class ProductController extends Controller
{

    public function actionIndex(){
        return $this->render('index');
    }

    public function actionCreate(){
        return $this->render('create');
    }

    public function actionUpdate(){
        return $this->render('update');
    }

    public function actionDelete(){
        return $this->render('delete');
    }
}