<?php
/* @var $this yii\web\View */

use yii\widgets\DetailView;
use yii\helpers\Html;
?>
<h1>Rozpoczęcie nauki</h1>

<p>Zestaw nr <?= $zestaw->id; ?> </p>
<p>STATE: <?= $method; ?> </p>
<p>CORRECT ANSWERS:</p>
<p>WRONG ANSWERS:</p>

    <?= DetailView::widget([
        'model' => $zestaw,
        'attributes' => [
            'id',
            'nazwa',
            'zestaw:ntext',
        ],
    ]) ?>

<?= Html::a('Losowo', [ 'test/next', 'mode' => 1, ], [ 'class' => 'btn btn-primary' ]) ?>&nbsp;&nbsp;
<?= Html::a('Sekwencyjnie', [ 'test/next', 'mode' => 2, ], [ 'class' => 'btn btn-primary' ]) ?>