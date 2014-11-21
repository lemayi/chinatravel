<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\CheckboxColumn;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Provinces';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="province-index">

    <p>
        <?= Html::a('Create Province', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            [
                'attribute' => 'name',
                'format' => 'html',
                'value'=>function ($data) {
                            return Html::a($data->name, ['update', 'id' => $data->id]);
                        },
            ],
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
            ],
            [
                'attribute'=>'created_at', 
                'format'=>['date', 'php:Y-m-d H:i:s'],
            ],
            [
                'attribute'=>'updated_at', 
                'format'=>['date', 'php:Y-m-d H:i:s'],
            ],
            [   
                'class' => 'yii\grid\ActionColumn',
                'template' => '{city} {tipsclass} {view} {update} {delete}',
                'buttons' => [
                    'city' => function ($url, $model) {
                        return Html::a('<span class="label label-success">Cities</span>', $url, [
                                    'title' => Yii::t('yii', 'City List'),
                                    'data-pjax' => '0',
                        ]);
                    },
                    'tipsclass' => function ($url, $model) {
                        return Html::a('<span class="label label-primary">Tips Class</span>', $url, [
                                    'title' => Yii::t('yii', 'Trip Class'),
                                    'data-pjax' => '0',
                        ]);
                    },
                    'view' => function ($url, $model) {
                        return Html::a('<span class="label label-info">View</span>', $url, [
                                    'title' => Yii::t('yii', 'View'),
                                    'data-pjax' => '0',
                        ]);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('<span class="label label-warning">Update</span>', $url, [
                                    'title' => Yii::t('yii', 'Update'),
                                    'data-pjax' => '0',
                        ]);
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
                'headerOptions' => ['width' => '30%'],
            ],
        ],
    ]); ?>

</div>
