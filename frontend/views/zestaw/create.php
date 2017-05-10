<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Zestaw */

$this->title = 'Create Zestaw';
$this->params['breadcrumbs'][] = ['label' => 'Zestaws', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zestaw-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
