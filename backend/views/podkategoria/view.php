<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Podkategoria */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Podkategoria', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="podkategoria-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Aktualizuj', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Usuń', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Czy na pewno chcesz usunąć?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'kategoria.nazwa',
            'nazwa',
            'opis:ntext',
            'obrazek',
        ],
    ]) ?>

</div>
