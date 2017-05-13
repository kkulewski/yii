<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\KategoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kategoria';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategoria-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Dodaj kategorię', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nazwa:text:Nazwa kategorii',
            'opis:ntext:Opis',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
