<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Zestaw */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zestaw-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'konto_id')->textInput() ?>

    <?= $form->field($model, 'jezyk1_id')->textInput() ?>

    <?= $form->field($model, 'jezyk2_id')->textInput() ?>

    <?= $form->field($model, 'podkategoria_id')->textInput() ?>

    <?= $form->field($model, 'nazwa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zestaw')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ilosc_slowek')->textInput() ?>

    <?= $form->field($model, 'data_dodania')->textInput() ?>

    <?= $form->field($model, 'data_edycji')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
