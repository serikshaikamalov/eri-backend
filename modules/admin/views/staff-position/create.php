<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StaffPosition */

$this->title = 'Create Staff Position';
$this->params['breadcrumbs'][] = ['label' => 'Staff Positions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-position-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
