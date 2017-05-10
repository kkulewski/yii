<?php
/* @var $this yii\web\View */

use yii\widgets\DetailView;
use yii\helpers\Html;
?>
<h1>test/start</h1>

<p>
Rozpoczęcie zestawu nr <?= $zestaw->id; ?>
</p>

    <?= DetailView::widget([
        'model' => $zestaw,
        'attributes' => [
            'id',
            'nazwa',
            'zestaw:ntext',
        ],
    ]) ?>

<?= Html::a('Pierwsze pytanie', [ 'test/next' ], [ 'class' => 'btn btn-primary' ]) ?>