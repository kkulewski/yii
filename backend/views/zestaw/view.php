<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Zestaw */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Zestaw', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zestaw-view">

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
			[ 'label' => 'Autor', 'attribute' => 'konto.username', ],
			[ 'label' => 'Język 1', 'attribute' => 'jezyk1.nazwa', ],
			[ 'label' => 'Język 2', 'attribute' => 'jezyk2.nazwa', ],
			[ 'label' => 'Podkategoria', 'attribute' => 'podkategoria.nazwa', ],
			[ 'label' => 'Nazwa zestawu', 'attribute' => 'nazwa', ],
			[ 'label' => 'Zawartość', 'attribute' => 'zestaw', 'format' => 'ntext', ],
			[ 'label' => 'Ilość słówek', 'attribute' => 'ilosc_slowek', ],
        ],
    ]) ?>

</div>
