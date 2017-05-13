<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ZestawSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Zestawy';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zestaw-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Dodaj zestawy', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
			[ 'label' => 'Autor', 'value' => 'konto.username', ],
			[ 'label' => 'Język 1', 'value' => 'jezyk1.nazwa', ],
			[ 'label' => 'Język 2', 'value' => 'jezyk2.nazwa', ],
			[ 'label' => 'Podkategoria', 'value' => 'podkategoria.nazwa', ],
			[ 'label' => 'Nazwa zestawu', 'value' => 'nazwa', ],
			[ 'label' => 'Ilość słówek', 'value' => 'ilosc_slowek', ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
