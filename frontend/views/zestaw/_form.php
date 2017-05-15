<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Zestaw */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zestaw-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'konto_id')->hiddenInput(['value' => Yii::$app->user->identity->id])->label(false); ?>

    <?= $form->field($model, 'jezyk1_id')->dropDownList($jezyki1)->label('Język 1') ?>

    <?= $form->field($model, 'jezyk2_id')->dropDownList($jezyki2)->label('Język 2') ?>

    <?= $form->field($model, 'podkategoria_id')->dropDownList($podkategorie)->label('Podkategoria') ?>

    <?= $form->field($model, 'nazwa')->textInput(['maxlength' => true])->label('Nazwa zestawu') ?>

    <?= $form->field($model, 'zestaw')->textarea(['rows' => 6])->label('Zawartość') ?>

    <?= $form->field($model, 'ilosc_slowek')->textInput()->label('Ilość słówek') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Dodaj' : 'Aktualizuj', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
