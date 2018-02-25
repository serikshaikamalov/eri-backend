<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StaffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Staff';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <!-- Menu -->
    <div class="col-md-3">
        <div class="list-group">
            <a href="/web/admin/staff" class="list-group-item list-group-item-action active">Staff List</a>
            <a href="/web/admin/staff-type" class="list-group-item list-group-item-action">Staff Type</a>
            <a href="/web/admin/staff-position" class="list-group-item list-group-item-action">Staff Position</a>
        </div>
    </div>

    <!-- List -->
    <div class="col-md-9">
        <div class="staff-index">

            <h1><?= Html::encode($this->title) ?></h1>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a('Create Staff', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'FullName',
                    [
                        'attribute' => 'StaffPositionId',
                        'label' => 'Position',
                        'value' => function( $item ){
                            return $item->staffPosition->Title;
                        },
                        'filter' => \app\models\StaffPosition::getStaffPositionList()
                    ],
                    [
                        'attribute' => 'StatusId',
                        'label' => 'Status',
                        'value' => function( $item ){
                            return $item->status->Title;
                        },
                        'filter' => \app\models\Status::getStatusList()
                    ],


                    // 'ResearchGroupTitle',
                    // 'ShortBiography:ntext',
                    // 'AvatarPath',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
