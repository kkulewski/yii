<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Zestaw */

$this->title = 'Dodaj zestawy';
$this->params['breadcrumbs'][] = ['label' => 'Zestawy', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zestaw-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'konta' => $konta,
		'jezyki1' => $jezyki1,
		'jezyki2' => $jezyki2,
		'podkategorie' => $podkategorie,
    ]) ?>

</div>
