<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
?>
<h1>Nastepne pytanie wewnatrz testu nr
    <?= $id; ?>
</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>

<p>
    Testowanie:
    <?php var_dump($test); ?>
</p>

<?php $form = ActiveForm::begin() ?>
<?= $form->field($nowa_odpowiedz, 'para_nr')->hiddenInput()->label(false); ?>
<?= $form->field($nowa_odpowiedz, 'para_pytanie')->hiddenInput()->label(false); ?>
<?= $form->field($nowa_odpowiedz, 'para_odpowiedz')->hiddenInput()->label(false); ?>

<h2><?= $nowa_odpowiedz->para_pytanie; ?></h2>

<?= $form->field($nowa_odpowiedz, 'odpowiedz_podana') ?>

<div class="form-group">
	<?= Html::submitButton('Sprawdź', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end() ?>



