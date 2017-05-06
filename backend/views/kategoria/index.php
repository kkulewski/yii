<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\KategoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kategorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategoria-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Kategoria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nazwa',
            'opis:ntext',
            'obrazek',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
