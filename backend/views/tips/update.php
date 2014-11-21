<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tips */

$this->title = 'Update Tips: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tips', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tips-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
