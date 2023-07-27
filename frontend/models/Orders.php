<?php

namespace frontend\models;

use yii\db\ActiveRecord;

class Orders extends ActiveRecord
{

    public static function tableName()
    {
        return 'orders';
    }

    public function getOrderDetail(){

        return $this->hasMany(OrderDetail::class, ['order_id' => 'id']);
    }

    public function getProducts(){

        return $this->hasMany(Product::class, ['id' => 'product_id'])->via('orderDetail');
    }
}