<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Staff */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="staff-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'Title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IsActive')->textInput() ?>

    <?= $form->field($model, 'FullName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PositionTitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ResearchGroupTitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ShortBiography')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'AvatarPath')->textInput(['maxlength' => true]) ?>

    <?=
        $form->field($model, 'ImageManager_id_avatar')->widget(\noam148\imagemanager\components\ImageManagerInputWidget::className(), [
            'aspectRatio' => (16/9), //set the aspect ratio
            'cropViewMode' => 1, //crop mode, option info: https://github.com/fengyuanchen/cropper/#viewmode
            'showPreview' => true, //false to hide the preview
            'showDeletePickedImageConfirm' => false, //on true show warning before detach image
        ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
