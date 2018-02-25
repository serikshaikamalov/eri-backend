<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DailyMonitor */

$this->title = 'Update Daily Monitor: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Daily Monitors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Title, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="daily-monitor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
