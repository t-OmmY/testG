<?php

use frontend\models\Search;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Clients');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <? Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'firstName',
            'lastName',
            [
                'label' => 'Phones',
                'value' => function($model) {
                    return join(', ', yii\helpers\ArrayHelper::map($model->phones, 'id', 'value'));
                },
            ],
        ],
    ]); ?>
    <? Pjax::end(); ?>
</div>