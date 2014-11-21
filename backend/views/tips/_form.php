<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use letyii\tinymce\Tinymce;

/* @var $this yii\web\View */
/* @var $model app\models\Tips */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tips-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tips_class_id')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'keyword')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'intro')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->dropDownList($model->getStatusArray()) ?>

    <?= $form->field($model, 'content')->widget(
        Tinymce::className(), 
        [
            'options' => [
                'id' => 'tips_content',
            ],
            'configs' => [
                'plugins' => 'code autosave link image print preview fullscreen wordcount media table',
            ],
        ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
