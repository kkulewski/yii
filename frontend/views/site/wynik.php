<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\WynikSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wyniki';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wynik-index">

    <h1><?= Html::encode($this->title) ?></h1>
	
    <?= GridView::widget([
        'dataProvider' => $wynikModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'konto.username:text:Nazwa użytkownika',
            'zestaw.nazwa:text:Zestaw',
            'data_wyniku:date:Data',
            'wynik:integer:Wynik',
        ],
    ]); ?>
	
</div>
