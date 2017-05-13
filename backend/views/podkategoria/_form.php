<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Podkategoria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="podkategoria-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kategoria_id')->dropDownList($kategorie)->label('Kategoria') ?>

    <?= $form->field($model, 'nazwa')->textInput(['maxlength' => true])->label('Nazwa podkategorii') ?>

    <?= $form->field($model, 'opis')->textarea(['rows' => 6])->label('Opis') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Dodaj' : 'Aktualizuj', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
