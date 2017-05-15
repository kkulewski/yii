<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
$this->title = 'Nauka - zestaw #'.$id;
$resultText = 'wynik';
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = $resultText;
?>
<h2>Zestaw #<?= $id; ?></h2>
<li class="list-group-item list-group-item-info">Wynik - <strong><?= $resultPercent; ?>%</strong></li>
<li class="list-group-item list-group-item-success">Prawidłowe: <?= $correct; ?></li>
<li class="list-group-item list-group-item-danger">Błędne: <?= $wrong; ?></li>


<?= Html::a('Spróbuj ponownie', ['test/view', 'id' => $id], ['class' => 'btn btn-primary']) ?>