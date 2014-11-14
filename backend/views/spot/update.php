<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Spot */

$this->title = 'Update Spot: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Spots', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="spot-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
