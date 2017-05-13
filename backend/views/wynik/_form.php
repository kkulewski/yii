<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Wynik */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wynik-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'konto_id')->dropDownList($konta)->label('Nazwa użytkownika') ?>

    <?= $form->field($model, 'zestaw_id')->dropDownList($zestawy)->label('Zestaw') ?>

    <?= $form->field($model, 'data_wyniku')->textInput()->label('Data') ?>

    <?= $form->field($model, 'wynik')->textInput()->label('Uzyskany wynik') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Dodaj' : 'Aktualizuj', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
