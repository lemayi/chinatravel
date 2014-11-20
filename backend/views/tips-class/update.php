<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipsClass */

$this->title = 'Update Tips Class: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tips Classes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tips-class-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
