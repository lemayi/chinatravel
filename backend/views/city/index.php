<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Province;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'City List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-index">

    <p>
        <?= Html::a('Create City', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            [
                'attribute' => 'province_id',
                'format' => 'html',
                'value'=>function ($data) {
                            return Html::a(Province::getProvinceName($data->province_id), ['update', 'id' => $data->id]);
                        },
            ],
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
                            }else if(2 == $data->status){
                                return Html::tag('span', ' ', ['class' => 'label label-danger glyphicon glyphicon-remove']);
                            }
                        },
                'filter'=> ['1' => 'Enable', '2' => 'Disable'],
            ],
            [   
                'class' => 'yii\grid\ActionColumn',
                'template' => '{town} {view} {update} {delete}',
                'buttons' => [
                    'town' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-cloud"></span>', $url, [
                                    'title' => Yii::t('yii', 'town List'),
                                    'data-pjax' => '0',
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>

</div>
