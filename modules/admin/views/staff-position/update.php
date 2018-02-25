<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StaffPosition */

$this->title = 'Update Staff Position: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Staff Positions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Title, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="staff-position-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
