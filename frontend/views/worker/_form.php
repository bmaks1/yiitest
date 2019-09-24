<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\Worker */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="worker-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $items = ArrayHelper::map($positions,'id','name');
    $params = [
        'prompt' => 'Choose position',

    ];
    echo $form->field($model, 'position_id')->dropDownList($items,$params);
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'soname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'characteristic')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'salary')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
