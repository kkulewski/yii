<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->params['breadcrumbs'][] = ['label' => 'Kategorie', 'url' => ['index']];
$this->title = $kategoria->nazwa;

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="podkategoria-index">

    <h1><?= Html::encode($this->title) ?></h1>
	
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'kategoria_id',
            'nazwa',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}',],
        ],
    ]); ?>
</div>
