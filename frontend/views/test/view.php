<?php
/* @var $this yii\web\View */

use yii\widgets\DetailView;
use yii\helpers\Html;


$this->title = 'Nauka - zestaw #'.$zestaw->id;
$this->params['breadcrumbs'][] = $this->title;
?>
<h2>Zestaw #<?= $zestaw->id; ?></h2>

<div class="col-lg-12">
    <?= DetailView::widget([
        'model' => $zestaw,
        'attributes' => $attributes,
    ]) ?>
	<?= Html::a('Wyświetl zestaw', [ 'test/view', 'id' => $zestaw->id, 'show' => TRUE ], [ 'class' => 'btn btn-primary' ]) ?>
</div>	
<p></p>
<div class="col-lg-12">
	<h2>Tryb nauki</h2>
	<div class="col-lg-6">
		<?= Html::a('Losowo 1 >> 2 do skutku', [ 'test/next', 'mode' => 1, 'reverse' => FALSE, 'singleMode' => FALSE, ], [ 'class' => 'btn btn-primary' ]) ?><br/><br/>
		<?= Html::a('Losowo 2 >> 1 do skutku', [ 'test/next', 'mode' => 1, 'reverse' => TRUE, 'singleMode' => FALSE, ], [ 'class' => 'btn btn-primary' ]) ?><br/><br/>
		<?= Html::a('Losowo 1 >> 2 pojedynczo', [ 'test/next', 'mode' => 1, 'reverse' => FALSE, 'singleMode' => TRUE, ], [ 'class' => 'btn btn-primary' ]) ?><br/><br/>
		<?= Html::a('Losowo 2 >> 1 pojedynczo', [ 'test/next', 'mode' => 1, 'reverse' => TRUE, 'singleMode' => TRUE ], [ 'class' => 'btn btn-primary' ]) ?>
	</div>
	<div class="col-lg-6">
		<?= Html::a('Sekwencyjnie 1 >> 2 do skutku', [ 'test/next', 'mode' => 2, 'reverse' => FALSE, 'singleMode' => FALSE, ], [ 'class' => 'btn btn-primary' ]) ?><br/><br/> 
		<?= Html::a('Sekwencyjnie 2 >> 1 do skutku', [ 'test/next', 'mode' => 2, 'reverse' => TRUE, 'singleMode' => FALSE, ], [ 'class' => 'btn btn-primary' ]) ?><br/><br/>
		<?= Html::a('Sekwencyjnie 1 >> 2 pojedynczo', [ 'test/next', 'mode' => 2, 'reverse' => FALSE, 'singleMode' => TRUE,], [ 'class' => 'btn btn-primary' ]) ?><br/><br/> 
		<?= Html::a('Sekwencyjnie 2 >> 1 pojedynczo', [ 'test/next', 'mode' => 2, 'reverse' => TRUE, 'singleMode' => TRUE,], [ 'class' => 'btn btn-primary' ]) ?>
	</div>
</div>
<div class="col-lg-12">
	<h2>Tryb sprawdzenia wiedzy</h2>
<?= Html::a('Sprawdzian 1 >> 2', [ 'test/next', 'mode' => 1, 'reverse' => FALSE, 'singleMode' => TRUE, 'examMode' => TRUE, ], [ 'class' => 'btn btn-primary' ]) ?><br/><br/> 
<?= Html::a('Sprawdzian 2 >> 1', [ 'test/next', 'mode' => 1, 'reverse' => TRUE, 'singleMode' => TRUE, 'examMode' => TRUE, ], [ 'class' => 'btn btn-primary' ]) ?>
</div>
