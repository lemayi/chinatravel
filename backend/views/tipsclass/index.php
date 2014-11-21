<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TipsClassSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tips Classes';
$params = Yii::$app->request->get('TipsClassSearch');
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
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tips-class-index">

    <p>
        <? $params = Yii::$app->request->get('TipsClassSearch'); ?>
        <? if(!empty($params['province_id'])): ?>
            <?= Html::a('Create Tips Class', ['create', 'province_id'=>$params['province_id']], ['class' => 'btn btn-success']) ?>
        <? endif ?>
        <? if(!empty($params['city_id'])): ?>
            <?= Html::a('Create Tips Class', ['create', 'city_id'=>$params['city_id']], ['class' => 'btn btn-success']) ?>
        <? endif ?>
        <? if(!empty($params['town_id'])): ?>
            <?= Html::a('Create Tips Class', ['create', 'town_id'=>$params['town_id']], ['class' => 'btn btn-success']) ?>
        <? endif ?>
        <? if(!empty($params['location_id'])): ?>
            <?= Html::a('Create Tips Class', ['create', 'location_id'=>$params['location_id']], ['class' => 'btn btn-success']) ?>
        <? endif ?>
        <? if(!empty($params['spot_id'])): ?>
            <?= Html::a('Create Tips Class', ['create', 'spot_id'=>$params['spot_id']], ['class' => 'btn btn-success']) ?>
        <? endif ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
             'id',
            'name',
            [
                'attribute' => 'status',
                'format' => 'html',
                'value'=>function ($data) {
                    if(1 == $data->status){
                        return Html::tag('span', ' ', ['class' => 'label label-success glyphicon glyphicon-ok']);
                        // return '<span class="glyphicon glyphicon-ok"></span>';
                    }else if(2 == $data->status){
                        return Html::tag('span', ' ', ['class' => 'label label-danger glyphicon glyphicon-remove']);
                    }
                },
                'filter'=> ['1' => 'Enable', '2' => 'Disable'],
            ],

            [   
                'class' => 'yii\grid\ActionColumn',
                'template' => '{city} {tips} {view} {update} {delete}',
                'buttons' => [
                    'tips' => function ($url, $model) {
                        return Html::a(
                            '<span class="label label-primary">Tips</span>', 
                            ['tips', 'id' => $model->id],
                            [
                                'title' => Yii::t('yii', 'Tips'),
                                'data-pjax' => '0',
                            ]
                        );
                    },
                    'view' => function ($url, $model) {
                        return Html::a(
                            '<span class="label label-info">View</span>', 
                            ['view', 'id' => $model->id, 'province_id' => $model->province_id],
                            [
                                'title' => Yii::t('yii', 'View'),
                                'data-pjax' => '0',
                            ]
                        );
                    },
                    'update' => function ($url, $model) {
                        return Html::a(
                            '<span class="label label-warning">Update</span>', 
                            ['update', 'id' => $model->id, 'province_id' => $model->province_id],
                            [
                                'title' => Yii::t('yii', 'Update'),
                                'data-pjax' => '0',
                            ]
                        );
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="label label-danger">Delete</span>', $url, [
                            'title' => Yii::t('yii', 'Delete'),
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                        ]);
                    },
                ],
                'headerOptions' => ['width' => '20%'],
            ],
        ],
    ]); ?>

</div>
