<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Province;
use backend\models\City;

/* @var $this yii\web\View */
/* @var $model app\models\Tips */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tips-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'province_id')->dropDownList(Province::getProvinceList()) ?>

    <?= $form->field($model, 'city_id')->dropDownList(City::getCityList($model->province_id)) ?>

    <?= $form->field($model, 'tips_class_id')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'intro')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'keyword')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'status')->dropDownList($model->getStatusArray()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
