<?php
/* @var $this yii\web\View */

use yii\widgets\DetailView;
use yii\helpers\Html;
?>
<h2>Zestaw #<?= $zestaw->id; ?></h2>

    <?= DetailView::widget([
        'model' => $zestaw,
        'attributes' => $attributes,
    ]) ?>

<div class="col-lg-12">
<?= Html::a('Wyświetl zestaw', [ 'test/start', 'id' => $zestaw->id, 'show' => TRUE ], [ 'class' => 'btn btn-primary' ]) ?>
</div>	
	
<div class="col-lg-6">
	<h2>Tryb nauki</h2>
	<?= Html::a('Losowo', [ 'test/next', 'mode' => 1, 'reverse' => FALSE, ], [ 'class' => 'btn btn-primary' ]) ?>&nbsp;&nbsp;
	<?= Html::a('Sekwencyjnie', [ 'test/next', 'mode' => 2, 'reverse' => FALSE, ], [ 'class' => 'btn btn-primary' ]) ?>
</div>
<div class="col-lg-6">
	<h2>Tryb sprawdzenia wiedzy</h2>
<?= Html::a('Losowo R', [ 'test/next', 'mode' => 1, 'reverse' => TRUE, ], [ 'class' => 'btn btn-primary' ]) ?>&nbsp;&nbsp; 
<?= Html::a('Sekwencyjnie R', [ 'test/next', 'mode' => 2, 'reverse' => TRUE, ], [ 'class' => 'btn btn-primary' ]) ?>
</div>
