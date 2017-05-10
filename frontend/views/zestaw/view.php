<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Zestaw */

$kategoria = $model->podkategoria->kategoria;
$podkategoria = $model->podkategoria;

$this->title = 'Zestaw: '.$model->nazwa;
$this->params['breadcrumbs'][] =
    ['label' => 'Kategorie', 'url' => Url::to(['kategoria/index'])];
$this->params['breadcrumbs'][] =
    ['label' => $kategoria->nazwa,
     'url' => Url::to(['kategoria/view', 'id' => $kategoria->id])];
$this->params['breadcrumbs'][] =
    ['label' => $podkategoria->nazwa,
     'url' => Url::to(['podkategoria/view', 'id' => $podkategoria->id])];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zestaw-view">

    <h1><?= Html::encode($this->title) ?></h1>

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nazwa',
            'zestaw:ntext',
        ],
    ]) ?>

<?= Html::a('Rozpocznij', ['test/start', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    
</div>
