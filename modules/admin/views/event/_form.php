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

    <!-- Title -->
    <?= $form->field($model, 'Title')->textInput(['maxlength' => true]) ?>

    <!-- Start Day -->
<!--    --><?//= $form->field($model, 'StartDay')->widget(\yii\jui\DatePicker::className(), [
//            'clientOptions' => ['defaultDate' => '2018-01-01'],
//            'dateFormat' => 'yyyy-MM-dd',
//    ])
//    ?>

    <?= $form->field($model, 'StartDay')->input('date') ?>

    <!-- Start Time -->
    <?= $form->field($model, 'StartTime')->input('time'); ?>

    <!-- Description -->
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

    <!-- Languages -->
    <?
        echo $form->field($model, 'LangId')->dropDownList( $languages, ['prompt' => 'Select Language'] )
    ?>


    <?= $form->field($model, 'SpeakerFullName')->textInput(['maxlength' => true]) ?>

    <!-- Status -->
    <?
        echo $form->field($model, 'IsActive')->dropDownList($statuses, ['prompt' => 'Select Status']);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
