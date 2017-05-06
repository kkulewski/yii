<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Uprawnienia */

$this->title = 'Create Uprawnienia';
$this->params['breadcrumbs'][] = ['label' => 'Uprawnienias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uprawnienia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
