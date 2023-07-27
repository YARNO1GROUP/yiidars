<?php


use yii\bootstrap5\LinkPager;
use yii\grid\GridView;
use yii\helpers\Html;

echo GridView::widget([
    'dataProvider' => $provider,
//    'showHeader' => false, "headerni yashirish",
    'tableOptions' => ['class' => 'table table-dark'],
    'layout' => "{summary}\n{items}\n{pager}",
    'summary' => "Jami <b class='text-danger'>{totalCount}</b> tadan <b class='text-danger'>{count}-{end}</b> tasi ko`rsatilyapti",
    'showFooter'=>true, //"bu jadvaldagi qanaqadur raqamalr bolsa ularning umumiy yig'indisini chiqaradi",
    'columns' => [
        ['class' => \yii\grid\CheckboxColumn::className()], //chekboksda tanlash
        'id',
//        [
//            'label' => 'ID',
//            'attribute' => 'id',
//            'value' => function($data){
//                return $data->id + 10;
//            }
//        ],
        [
            'label' => 'Muallif',
            'attribute' => 'author_id',
            'value' => 'author.username'
        ],
        [
            'label' => 'Kategoriya',
            'attribute' => 'category_id',
            'value' => 'category.name',
            'footer' => \frontend\models\Post::getNumber(),
        ],

        'title',
        'body:html',
        [
            'attribute' => 'created_at',
            'format' => ['date', 'php:Y-m-d H:i:s']
        ],
        [
            'label' => 'Image',
            'format' => 'raw',
            'value' => function($data){
                return Html::img(Yii::getAlias('@web').'/img/yii_logo.png',[
                    'alt'=>'yii2 - image in gridview',
                    'style' => 'width:50px;',
//                    'class' => 'img-thumbnail'
                ]);
            },
        ],
        [
            'label' => 'Link',
            'format' => 'raw',
            'value' => function($data){
                return Html::a(
                    'Go',
                    $data->id,
                    [
                        'title' => 'Go Go Go!',
                        'target' => '_blank'
                    ]
                );
            },
            'options' => ['width' =>'50'],
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete} {link}',
            'buttons' => [
                'update' => function ($url, $model) {
                    return Html::a(
                        '<i class="bi bi-pencil"></i>',
                        $url);
                },
                'link' => function ($url, $model, $key) {
                    return Html::a('Action', $url);
                },
            ],
        ],
    ],
    'pager' => [
        'class' => LinkPager::class,
        'maxButtonCount' => 3,
    ]
]);