<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use yii\helpers\Url;

use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model common\models\Kategoria */

$this->title = 'Kategoria: '.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kategorie', 'url' => Url::to(['kategoria/index'])];
$this->params['breadcrumbs'][] = $model->nazwa;
?>
<div class="kategoria-view">

    <h1>Kategoria: <?= Html::encode($model->nazwa) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <b>
	test
    </b>

    <?= GridView::widget([
        'dataProvider' => $podkategorie_provider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nazwa',

            ['class' => 'yii\grid\ActionColumn', 'controller' => 'podkategoria'],
        ],
    ]); ?>

</div>
