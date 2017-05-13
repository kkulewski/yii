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

    <?= GridView::widget([
        'dataProvider' => $podkategorie_provider,
        'columns' => [
            'nazwa:text:Nazwa podkategorii',

            ['class' => 'yii\grid\ActionColumn', 'controller' => 'podkategoria'],
        ],
    ]); ?>

</div>
