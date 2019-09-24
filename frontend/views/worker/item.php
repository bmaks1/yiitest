<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Worker */
/* @var $positions array */

$this->title = $model->id ? 'Update Worker' : 'Create Worker';
$this->params['breadcrumbs'][] = ['label' => 'Workers', 'url' => ['index']];
if($model->id)
{
    $this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
    $this->params['breadcrumbs'][] = 'Update';
}
else
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="worker-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'positions' => $positions,
    ]) ?>

</div>
