<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Rola */

$this->title = 'Aktualizuj rolę: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Rola', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Aktualizuj';
?>
<div class="rola-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
