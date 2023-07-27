<h1>This is page Post/Edit</h1>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;



$form = ActiveForm::begin([
    'id' => 'active-form',
    'options' => [
        'enctype' => 'multipart/form-data'
    ],
]);

echo $form->field($model, 'author_id');
echo $form->field($model, 'category_id');
echo $form->field($model, 'title');
echo $form->field($model, 'body');

echo Html::submitButton('Yuborish', ['class' => 'btn btn-primary']);

ActiveForm::end();