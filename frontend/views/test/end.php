<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

?>
<h1>test/end</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>


<?= Html::a('Wykonaj test ponownie', ['test/start', 'id' => $id], ['class' => 'btn btn-primary']) ?>