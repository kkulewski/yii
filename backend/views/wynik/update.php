<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Wynik */

$this->title = 'Update Wynik: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Wyniks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="wynik-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
