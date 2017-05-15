<?php
/* @var $this yii\web\View */

use yii\widgets\DetailView;
use yii\helpers\Html;


$this->title = 'Nauka - zestaw #'.$zestaw->id;
$this->params['breadcrumbs'][] = $this->title;
?>
<h2>Zestaw #<?= $zestaw->id; ?></h2>

<div class="col-lg-12">
<p>Postęp: <progress max="100" min="0" value="<?= $topScore ?>"></progress> (<?= $topScore; ?>%)</p>
    <?= DetailView::widget([
        'model' => $zestaw,
        'attributes' => $attributes,
    ]) ?>
	<?= Html::a('Wyświetl zestaw', [ 'test/view', 'id' => $zestaw->id, 'show' => TRUE ], [ 'class' => 'btn btn-primary' ]) ?>
</div>	
<p></p>
<div class="col-lg-12">
	<h2><br>Tryb sprawdzenia wiedzy<br></h2><br>
	<div class="col-lg-6">
		<?= Html::a(''.$zestaw->jezyk1->nazwa.' >> '.$zestaw->jezyk2->nazwa.'', [ 'test/next', 'mode' => 1, 'reverse' => FALSE, 'singleMode' => TRUE, 'examMode' => TRUE, ], [ 'class' => 'btn btn-primary' ]) ?><br><br>
		<?= Html::a(''.$zestaw->jezyk2->nazwa.' >> '.$zestaw->jezyk1->nazwa.'', [ 'test/next', 'mode' => 1, 'reverse' => TRUE, 'singleMode' => TRUE, 'examMode' => TRUE, ], [ 'class' => 'btn btn-primary' ]) ?>
	</div>
</div>
<div class="col-lg-12">
	<h2><br/>Tryb nauki</h2>
	<div class="col-lg-6">
		<div class="col-lg-4">
			<h3>Losowo - do skutku</h3>
			<?= Html::a(''.$zestaw->jezyk1->nazwa.' >> '.$zestaw->jezyk2->nazwa.'', [ 'test/next', 'mode' => 1, 'reverse' => FALSE, 'singleMode' => FALSE, ], [ 'class' => 'btn btn-primary' ]) ?><br/><br/>
			<?= Html::a(''.$zestaw->jezyk2->nazwa.' >> '.$zestaw->jezyk1->nazwa.'', [ 'test/next', 'mode' => 1, 'reverse' => TRUE, 'singleMode' => FALSE, ], [ 'class' => 'btn btn-primary' ]) ?><br/><br/>
		</div>
	
		<div class="col-lg-4">
			<h3>Losowo - pojedynczo</h3>
			<?= Html::a(''.$zestaw->jezyk1->nazwa.' >> '.$zestaw->jezyk2->nazwa.'', [ 'test/next', 'mode' => 1, 'reverse' => FALSE, 'singleMode' => TRUE, ], [ 'class' => 'btn btn-primary' ]) ?><br/><br/>
			<?= Html::a(''.$zestaw->jezyk2->nazwa.' >> '.$zestaw->jezyk1->nazwa.'', [ 'test/next', 'mode' => 1, 'reverse' => TRUE, 'singleMode' => TRUE ], [ 'class' => 'btn btn-primary' ]) ?>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="col-lg-4">
			<h3>Sekwencyjnie - do skutku</h3>
			<?= Html::a(''.$zestaw->jezyk1->nazwa.' >> '.$zestaw->jezyk2->nazwa.'', [ 'test/next', 'mode' => 2, 'reverse' => FALSE, 'singleMode' => FALSE, ], [ 'class' => 'btn btn-primary' ]) ?><br/><br/> 
			<?= Html::a(''.$zestaw->jezyk2->nazwa.' >> '.$zestaw->jezyk1->nazwa.'', [ 'test/next', 'mode' => 2, 'reverse' => TRUE, 'singleMode' => FALSE, ], [ 'class' => 'btn btn-primary' ]) ?><br/><br/>
		</div>
		<div class="col-lg-4">
			<h3>Sekwencyjnie - pojedynczo</h3>
			<?= Html::a(''.$zestaw->jezyk1->nazwa.' >> '.$zestaw->jezyk2->nazwa.'', [ 'test/next', 'mode' => 2, 'reverse' => FALSE, 'singleMode' => TRUE,], [ 'class' => 'btn btn-primary' ]) ?><br/><br/> 
			<?= Html::a(''.$zestaw->jezyk2->nazwa.' >> '.$zestaw->jezyk1->nazwa.'', [ 'test/next', 'mode' => 2, 'reverse' => TRUE, 'singleMode' => TRUE,], [ 'class' => 'btn btn-primary' ]) ?>
		</div>
	</div>
</div>

