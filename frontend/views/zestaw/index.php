<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Zestawy';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zestaw-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'id',
            'nazwa',
            'zestaw:ntext',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}',],
        ],
    ]); ?>
</div>
