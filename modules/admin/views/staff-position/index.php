<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StaffPositionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Staff Positions';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">
    <!-- Menu -->
    <div class="col-md-3">
        <div class="list-group">
            <a href="/web/admin/staff" class="list-group-item list-group-item-action">Staff List</a>
            <a href="/web/admin/staff-type" class="list-group-item list-group-item-action">Staff Type</a>
            <a href="/web/admin/staff-position" class="list-group-item list-group-item-action active">Staff Position</a>
        </div>
    </div>

    <!-- List -->
    <div class="col-md-9">
        <div class="staff-position-index">

            <h1><?= Html::encode($this->title) ?></h1>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a('Create Staff Position', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'Id',
                    'Title',
                    'StatusId',
                    'LanguageId',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
