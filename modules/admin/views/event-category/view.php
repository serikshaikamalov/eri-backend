<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\admin\controllers\Helper;

/* @var $this yii\web\View */
/* @var $model app\models\EventCategory */

$this->title = $model->Title;
$this->params['breadcrumbs'][] = ['label' => 'Event Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php
        
    ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Event Category ID',
                'value' => $model->Id
            ],
            'Title',
            [
                'label' => 'Status',
                'value' => Helper::getStatusNameById( $model->IsActive)
            ],
            //'ParentId',
            [
                'label' => 'Parent Category',
                'value' => $parentCategoryTitle
            ],
            [
                'label' => 'Language',
                'value' => Helper::getLanguageNameById( $model->LangId )
            ],
        ],
    ]) ?>

</div>
