<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

?>
<h1>Wyniki testu</h1>

<p>STATE: <?= $method; ?></p>
<p>CORRECT: <?= $correct; ?></p>
<p>WRONG: <?= $wrong; ?></p>


<?= Html::a('Retry', ['test/start', 'id' => $id], ['class' => 'btn btn-primary']) ?>