<?php


use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$form = ActiveForm::begin();

echo $form->field($person, 'firstname');
echo $form->field($person, 'lastname');
echo $form->field($person, 'birthday');
echo $form->field($person, 'phone');

echo Html::submitButton('Saqlash', ['class' => 'btn btn-success']);

ActiveForm::end();
