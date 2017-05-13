<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
$this->title = 'Nauka - zestaw #'.$id;
$resultText = 'wynik';
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = $resultText;
?>
<h2>Zestaw #<?= $id; ?></h2>
<h2>Wyniki</h2>
<p>Prawidłowe: <?= $correct; ?></p>
<p>Błędne: <?= $wrong; ?></p>


<?= Html::a('Spróbuj ponownie', ['test/view', 'id' => $id], ['class' => 'btn btn-primary']) ?>