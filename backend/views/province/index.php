<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
                'template' => '{city} {view} {update} {delete}',
                'buttons' => [
                    'city' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-cloud"></span>', $url, [
                                    'title' => Yii::t('yii', 'City List'),
                                    'data-pjax' => '0',
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>

</div>
