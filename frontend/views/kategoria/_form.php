<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Kategoria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kategoria-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nazwa')->textInput(['maxlength' => true]) ?>

    <?php ActiveForm::end(); ?>

</div>
