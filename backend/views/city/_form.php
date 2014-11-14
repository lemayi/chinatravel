<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Province;
use yii\helpers\ArrayHelper;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\City */
/* @var $form yii\widgets\ActiveForm */
$js = <<<JS
    $(function () {
        initSelect($("#city-province_id"), '', '', '');
    });
JS;
$this->registerJs($js, View::POS_END);

?>

<div class="city-form">


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'province_id')->dropDownList([]) ?>

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