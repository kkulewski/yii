<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput()->label('Nazwa użytkownika') ?>
	<?= $form->field($model, 'email')->textInput()->label('Adres email') ?>
	<?= $form->field($model, 'status')->textInput()->label('Status konta') ?>
	<?= $form->field($model, 'created_at')->textInput()->label('Utworzono') ?>
	<?= $form->field($model, 'updated_at')->textInput()->label('Zmodyfikowano') ?>
	<?= $form->field($model, 'dostep')->textInput()->label('Poziom dostępu') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Dodaj' : 'Aktualizuj', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
