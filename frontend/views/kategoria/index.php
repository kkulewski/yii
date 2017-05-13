<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wszystkie kategorie';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategoria-index">

    <h1><?= Html::encode($this->title) ?></h1>
	
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'nazwa:text:Nazwa kategorii',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update}',],
        ],
    ]); ?>
</div>
