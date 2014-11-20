<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TipsClass */

$this->title = 'Create Tips Class';
$this->params['breadcrumbs'][] = ['label' => 'Tips Classes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tips-class-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
