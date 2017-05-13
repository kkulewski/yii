<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Podkategoria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="podkategoria-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kategoria_id')->textInput() ?>

    <?= $form->field($model, 'nazwa')->textInput(['maxlength' => true]) ?>

    <?php ActiveForm::end(); ?>

</div>
