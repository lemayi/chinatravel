<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Province;
/* @var $this yii\web\View */
/* @var $model backend\models\TipsClass */

$this->title = $model->name;
$params = Yii::$app->request->get();
if(!empty($params['province_id'])){
    $this->params['breadcrumbs'][] = ['label' => 'Province', 'url' => ['/province']];
}
if(!empty($params['city_id'])){
    $this->params['breadcrumbs'][] = ['label' => 'city', 'url' => ['/city']];
}
if(!empty($params['town_id'])){
    $this->params['breadcrumbs'][] = ['label' => 'town', 'url' => ['/town']];
}
if(!empty($params['location_id'])){
    $this->params['breadcrumbs'][] = ['label' => 'location', 'url' => ['/location']];
}
if(!empty($params['spot_id'])){
    $this->params['breadcrumbs'][] = ['label' => 'spot', 'url' => ['/spot']];
}

$this->params['breadcrumbs'][] = [
    'label' => 'Tips Classes', 
    'url' => [
        'index', 
        'TipsClassSearch' => [
            'province_id' => isset($params['province_id']) ? $params['province_id'] : '',
            'city_id' => isset($params['city_id']) ? $params['city_id'] : '',
            'town_id' => isset($params['town_id']) ? $params['town_id'] : '',
            'location_id' => isset($params['location_id']) ? $params['location_id'] : '',
            'spot_id' => isset($params['spot_id']) ? $params['spot_id'] : '',
        ]
    ]
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tips-class-view">

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
            'city_id',
            'town_id',
            'location_id',
            'spot_id',
            'name',
            [
                'label' => 'Status',
                'format' => 'raw',
                'value' => (1 == $model->status) ? Html::tag('span', ' ', ['class' => 'label label-success glyphicon glyphicon-ok']) 
                                                                          : Html::tag('span', ' ', ['class' => 'label label-danger glyphicon glyphicon-remove']),
            ],
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
