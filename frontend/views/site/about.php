<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>This is the About page. You may modify the following file to customize its content:</p>
	<?php 		
		var_dump(\Yii::$app->user->can('createPost')); 
		var_dump(\Yii::$app->user->getId());
		var_dump(\Yii::$app->authManager);
		var_dump(\Yii::$app->user->can('updatePost'));
		//var_dump(\Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId()));
	?>

    <code><?= __FILE__ ?></code>
</div>
