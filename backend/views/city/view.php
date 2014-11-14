<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Province;

/* @var $this yii\web\View */
/* @var $model app\models\City */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label' => 'Province',
                'value' => Province::getProvinceName($model->province_id),
            ],
            'name',
            [
                'label' => 'Status',
                'value' => $model->getStatusById($model->status),
            ],
            'seo_title',
            'seo_keyword',
            'seo_desc:ntext',
            [
                'label' => 'Created At',
                'value' => date('Y-m-d H:i:s', $model->created_at),
            ],
            [
                'label' => 'Updated At',
                'value' => date('Y-m-d H:i:s', $model->updated_at),
            ],
        ],
    ]) ?>

</div>
