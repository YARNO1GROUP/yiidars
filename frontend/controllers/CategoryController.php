<?php

namespace frontend\controllers;

use frontend\models\Category;
use yii\data\Pagination;
use yii\data\Sort;
use yii\web\Controller;

class CategoryController extends Controller
{
    public function actionIndex(){

        $cat = Category::find();

        $sort = new Sort(['attributes' => [
            'title',
            'body'
        ]
        ]);

        $count = $cat->count();
        $pagination = new Pagination(['totalCount' => $count, 'defaultPageSize' => 5]);

        $category = $cat->orderBy($sort->orders)->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'category' => $category,
            'pagination' => $pagination,
            'sort' => $sort
        ]);
    }


    public function actionView($id){

        $cat = Category::findOne($id);

        return $this->render('view', [
            'category' => $cat
        ]);
    }

}