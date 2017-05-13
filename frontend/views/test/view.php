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
<div class="col-lg-6">
	<h2>Tryb nauki</h2>
	<div class="col-lg-3">
		<?= Html::a('Losowo 1 >> 2', [ 'test/next', 'mode' => 1, 'reverse' => FALSE, ], [ 'class' => 'btn btn-primary' ]) ?><br/><br/>
		<?= Html::a('Losowo 2 >> 1', [ 'test/next', 'mode' => 1, 'reverse' => TRUE, ], [ 'class' => 'btn btn-primary' ]) ?>
	</div>
	<div class="col-lg-3">
		<?= Html::a('Sekwencyjnie 1 >> 2', [ 'test/next', 'mode' => 2, 'reverse' => FALSE, ], [ 'class' => 'btn btn-primary' ]) ?><br/><br/> 
		<?= Html::a('Sekwencyjnie 2 >> 1', [ 'test/next', 'mode' => 2, 'reverse' => TRUE, ], [ 'class' => 'btn btn-primary' ]) ?>
	</div>
</div>
<div class="col-lg-6">
	<h2>Tryb sprawdzenia wiedzy</h2>
<?= Html::a('Sprawdzian 1 >> 2', [ 'test/next', 'mode' => 1, 'reverse' => TRUE, ], [ 'class' => 'btn btn-primary' ]) ?>&nbsp;&nbsp; 
<?= Html::a('Sprawdzian 2 >> 1', [ 'test/next', 'mode' => 2, 'reverse' => TRUE, ], [ 'class' => 'btn btn-primary' ]) ?>
</div>
