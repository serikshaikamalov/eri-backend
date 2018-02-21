<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Events */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="events-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'StartTime')->widget(\yii\jui\DatePicker::className(), ['clientOptions' => ['defaultDate' => '2014-01-01']]) ?>

    <?= $form->field($model, 'EndTime')->textInput() ?>

    <?//= $form->field($model, 'Description')->textarea(['rows' => 6]) ?>
    <?
        echo $form->field($model, 'Description')->widget(CKEditor::className(), [
            'options' => ['rows' => 200],
            'clientOptions' => [
                'filebrowserImageBrowseUrl' => yii\helpers\Url::to(['/imagemanager/manager', 'view-mode'=>'iframe', 'select-type'=>'ckeditor']),
                'height' => 700
            ]
        ]);
    ?>

    <?= $form->field($model, 'EventCategoryId')->dropDownList( $eventCategoriesVM, [ 'prompt' => 'Select Category' ] ) ?>

    <?= $form->field($model, 'LangId')->textInput() ?>

    <?= $form->field($model, 'SpeakerFullName')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'CreatedBy')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'CreatedDate')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'UpdatedDate')->textInput() ?>

    <?= $form->field($model, 'IsActive')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
