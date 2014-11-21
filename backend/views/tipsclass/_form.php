<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TipsClass */
/* @var $form yii\widgets\ActiveForm */
?>

<? $params = Yii::$app->request->get(); ?>

<div class="tips-class-form">

    <?php $form = ActiveForm::begin(); ?>

    <? if(!empty($params['province_id'])): ?>
        <?= Html::activeHiddenInput($model, 'province_id', ['value' => $params['province_id']])?>
    <? endif ?>

    <? if(!empty($params['city_id'])): ?>
        <?= Html::activeHiddenInput($model, 'city_id', ['value' => $params['city_id']])?>
    <? endif ?>

    <? if(!empty($params['town_id'])): ?>
        <?= Html::activeHiddenInput($model, 'town_id', ['value' => $params['town_id']])?>
    <? endif ?>

    <? if(!empty($params['location_id'])): ?>
        <?= Html::activeHiddenInput($model, 'location_id', ['value' => $params['location_id']])?>
    <? endif ?>

    <? if(!empty($params['spot_id'])): ?>
        <?= Html::activeHiddenInput($model, 'spot_id', ['value' => $params['spot_id']])?>
    <? endif ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'status')->dropDownList($model->getStatusArray()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
