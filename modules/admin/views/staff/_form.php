<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Staff */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="staff-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Id')->textInput() ?>

    <?= $form->field($model, 'Title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IsActive')->textInput() ?>

    <?= $form->field($model, 'FullName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PositionTitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ResearchGroupTitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ShortBiography')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'AvatarPath')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
