<?php

namespace frontend\controllers;

use common\models\User;
use frontend\models\Person;
use Yii;
use yii\data\Pagination;
use yii\data\Sort;
use yii\web\Controller;

class PersonController extends Controller
{
    public function actionAdd(){
        $person = new User();

        if ($person->load(\Yii::$app->request->post())){

            $person->save();
            $this->redirect('/post/index');
        }

        return $this->render('add', ['person' => $person]);
    }

    public function actionIndex(){

        $users = Person::find();

        $sort = new Sort(['attributes' => [
            'title',
            'body'
        ]
        ]);

        $count = $users->count();
        $pagination = new Pagination(['totalCount' => $count, 'defaultPageSize' => 5]);

        $users = $users->orderBy($sort->orders)->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();


        return $this->render('index', [
            'sort' => $sort,
            'users' => $users,
            'pagination' => $pagination
        ]);
    }


    public function actionEdit($id){

        $model = new Person();
        if (Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            $command = Yii::$app->db->createCommand()->update('person', [
                ['Firstname' => $model->firstname],
                ['Lastname' => $model->lastname],
                ['Birthday' => $model->birthday],
                ['Phone'> $model->phone]
            ],
                ['id' => $id]
            );
            $command->execute();
            $this->redirect('/person/index');

        }else{
            $command = Yii::$app->db->createCommand('select * from person where  id = :id');
            $command->bindValue('id', $id);
            $data = $command->queryOne();

            $model->firstname = $data['firstname'];
            $model->lastname = $data['lastname'];
            $model->birthday = $data['birthday'];
            $model->phone = $data['phone'];
        }


    }