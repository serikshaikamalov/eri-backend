<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DailyMonitorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daily Monitors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="daily-monitor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Daily Monitor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'Title',
            'Description:ntext',
            'Link',
            'IsActive',
            //'LanguageId',
            //'ImageId',
            //'CreatedBy',
            //'CreatedDate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
