<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use backend\models\Province;
use backend\models\City;
use backend\models\Town;

/* @var $this yii\web\View */
/* @var $model app\models\Location */
/* @var $form yii\widgets\ActiveForm */
$js = <<<JS
    $(function () {
        changeProvince($("#location-province_id"), $("#location-city_id"), $("#location-town_id"), '');
    });
JS;

$this->registerJs($js, View::POS_END);
?>

<div class="location-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'province_id')->dropDownList(Province::getProvinceList()) ?>

    <?= $form->field($model, 'city_id')->dropDownList(City::getCityList($model->province_id)) ?>

    <?= $form->field($model, 'town_id')->dropDownList(Town::getTownList($model->city_id)) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'status')->dropDownList($model->getStatusArray()) ?>

    <?= $form->field($model, 'seo_title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'seo_keyword')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'seo_desc')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
