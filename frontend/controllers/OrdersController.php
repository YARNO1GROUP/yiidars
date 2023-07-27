<?php

namespace frontend\controllers;

use frontend\models\Orders;
use yii\web\Controller;

class OrdersController extends Controller
{
    public function actionIndex(){

        $order = Orders::findOne(1);

        vd($order->products);

        return $this->render('index');
    }
}