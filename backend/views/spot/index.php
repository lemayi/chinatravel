<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SpotSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Spots';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spot-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Spot', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'province_id',
            'city_id',
            'town_id',
            'location_id',
            // 'status',
            // 'seo_title',
            // 'seo_keyword',
            // 'seo_desc:ntext',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
