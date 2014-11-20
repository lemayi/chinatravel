<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tips */

$this->title = 'Create Tips';
$this->params['breadcrumbs'][] = ['label' => 'Tips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tips-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
