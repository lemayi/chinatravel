<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Spot */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Spots', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spot-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Spot', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Back', ['index', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'province_id',
            'city_id',
            'town_id',
            'location_id',
            'status',
            'seo_title',
            'seo_keyword',
            'seo_desc:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
