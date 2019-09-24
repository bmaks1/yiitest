<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Position */

$this->title = $model->id ? 'Update Position: ' . $model->name : 'Create Position';
$this->params['breadcrumbs'][] = ['label' => 'Positions', 'url' => ['index']];
if($model->id)
{
    $this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
    $this->params['breadcrumbs'][] = 'Update';
}
else
    $this->params['breadcrumbs'][] = $this->title;

?>
<div class="position-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
