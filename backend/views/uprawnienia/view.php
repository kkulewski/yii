<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Uprawnienia */

$this->title = $model->konto_id;
$this->params['breadcrumbs'][] = ['label' => 'Uprawnienias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uprawnienia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'konto_id' => $model->konto_id, 'podkategoria_id' => $model->podkategoria_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'konto_id' => $model->konto_id, 'podkategoria_id' => $model->podkategoria_id], [
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
            'konto_id',
            'podkategoria_id',
        ],
    ]) ?>

</div>
