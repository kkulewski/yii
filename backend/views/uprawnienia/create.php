<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Uprawnienia */

$this->title = 'Dodaj uprawnienia';
$this->params['breadcrumbs'][] = ['label' => 'Uprawnienia', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uprawnienia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'konta' => $konta,
		'podkategorie' => $podkategorie,
    ]) ?>

</div>
