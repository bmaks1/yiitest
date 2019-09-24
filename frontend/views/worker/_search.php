<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\WorkerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="worker-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'position_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'soname') ?>

    <?= $form->field($model, 'characteristic') ?>

    <?php // echo $form->field($model, 'salary') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
