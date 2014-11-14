<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use backend\models\Province;
use backend\models\City;

/* @var $this yii\web\View */
/* @var $model app\models\Town */
/* @var $form yii\widgets\ActiveForm */

$js = <<<JS
    $(function () {
        initSelect($("#town-province_id"), $("#town-city_id"),'');
    });
JS;
$this->registerJs($js, View::POS_END);

?>

<div class="town-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'province_id')->dropDownList(Province::getDefaultProvinceOption($model->province_id)) ?>

    <?= $form->field($model, 'city_id')->dropDownList(City::getDefaultCityOption($model->city_id)) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'status')->dropDownList($model->getStatusArray()) ?>

    <?= $form->field($model, 'seo_title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'seo_keyword')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'seo_desc')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
