<?php

namespace frontend\controllers;


use frontend\models\Post;
use Yii;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\web\Controller;

class PostController extends Controller
{
    public $layout = 'main-old';

    public function actionIndex()
    {

        $count = Yii::$app->db->createCommand('Select Count(*) From post')->queryScalar();

        $provider = new SqlDataProvider([

            'sql' => 'Select * From post',
            'totalCount' => $count,
            'pagination' => [
                'pageSize' => 5,
            ],
         'sort' => [
        'attributes' => [
            'title',
            'body',
            ],
         ],
        ]);
        return $this->render('index', [
            'provider' => $provider,
        ]);

    }


    public function actionList()
    {

        $query = Post::find();
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
            'pagesize' => 6,
            ]
        ]);

        return $this->render('list', [
            'provider' => $provider
        ]);
    }

    public function actionGrid()
    {

        $provider = new ActiveDataProvider([
            'query' => Post::find(),
            'pagination' => [
                'pageSize' => 10,
            ]
        ]);

        return $this->render('grid', [
            'provider' => $provider,
        ]);
    }

    public function actionCreate(){

        $model = new Post();
        if (\Yii::$app->request->isPost){
            $model->load(\Yii::$app->request->post());
            if (!$model->validate()){
                \Yii::$app->session->setFlash('danger', $model->getErrorSummary(true)[0]);
            }else{

                \Yii::$app->db->createCommand()->insert('person', [
                    'author_id' => $model->author_id,
                    'category_id' => $model->category_id,
                    'title' => $model->title,
                    'body' => $model->body,
                ])->execute();

                \Yii::$app->session->setFlash('success','postdan qiymatlar load qilinadi');
            }

            $this->redirect('/post/create');
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }

    public function actionEdit($id){

        $model = new Post();
        if (Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            $command = Yii::$app->db->createCommand()->update('post', [
                ['author->username' => $model->author_id],
                ['category->name' => $model->category_id],
                ['title' => $model->title],
                ['body' => $model->body]
            ],
                ['id' => $id]
            );
            $command->execute();
            $this->redirect('/post/index');

        }else{
            $command = Yii::$app->db->createCommand('select * from post where  id = :id');
            $command->bindValue('id', $id);
            $data = $command->queryOne();

            $model->author_id = $data['author_id'];
            $model->category_id = $data['category_id'];
            $model->title = $data['title'];
            $model->body = $data['body'];
        }

        return $this->render('edit', ['model' => $model]);
    }

    public function actionDelete($id){

        Yii::$app->db->createCommand()->delete('post', 'id = :id', [':id' => $id])->execute();
        $this->redirect('/post/index');

        return $this->render('delete');
    }

    public function actionView($id){

        $command = Yii::$app->db->createCommand('select * from post where id = :id');
        $command->bindValue(':id', $id);
        $data = $command->queryOne();

        return $this->render('view', ['data' => $data]);
    }

}
