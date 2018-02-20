<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EventCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- Title -->
    <?= $form->field($model, 'Title')->textInput(['maxlength' => true]) ?>

    <!-- Published -->
    <?
        $items = [
            '0' => 'False',
            '1' => 'True',
        ];

        echo $form->field($model, 'IsActive')->dropDownList( $items );
    ?>

    <!-- Language -->
    <?
        $items = [
            '1' => 'English',
            '2' => 'Turkish',
            '3' => 'Russian',
            '4' => 'Kazakh'
        ];

        echo $form->field($model, 'LangId')->dropDownList($items)
    ?>

    <!-- Parent -->
    <?
        $params = [
            'prompt' => 'Select Category'
        ];
        echo $form->field($model, 'ParentId')->dropDownList($eventCategoriesDropdownList, $params);
    ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
