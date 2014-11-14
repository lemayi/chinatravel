<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create City', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'province_id',
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
                'attribute' => 'created_at',
                'value'=>function ($data) {
                            return date('Y-m-d H:i:s', $data->created_at);
                        },
            ],
            [
                'attribute' => 'updated_at',
                'value'=>function ($data) {
                            return date('Y-m-d H:i:s', $data->updated_at);
                        },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
