<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TipsClass */

$this->title = 'Create Tips Class';
$params = Yii::$app->request->get();
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
<div class="tips-class-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
