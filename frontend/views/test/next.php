<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
?>
<h1>Test nr <?= $id; ?>. Pytanie <?= $questionNumber; ?>/<?= $totalQuestions; ?></h1>

<?php $form = ActiveForm::begin() ?>
<?= $form->field($nextAnswer, 'pairNumber')->hiddenInput()->label(false); ?>
<?= $form->field($nextAnswer, 'pairQuestion')->hiddenInput()->label(false); ?>
<?= $form->field($nextAnswer, 'pairAnswer')->hiddenInput()->label(false); ?>

<h2><?= $nextAnswer->pairQuestion; ?></h2>

<?= $form->field($nextAnswer, 'userAnswer')->label(false) ?>

<div class="form-group">
	<?= Html::submitButton('Wyślij', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end() ?>



