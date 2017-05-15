<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

use yii\grid\GridView;
use yii\widgets\ListView;

use yii\data\ActiveDataProvider;
use common\models\Zestaw;
/* @var $this yii\web\View */
/* @var $model common\models\Podkategoria */

$this->title = 'Podkategoria: '.$model->nazwa;

$this->params['breadcrumbs'][] =
    ['label' => 'Kategorie', 'url' => Url::to(['kategoria/index'])];
$this->params['breadcrumbs'][] =
    ['label' => $kategoria->nazwa,
     'url' => Url::to(['kategoria/view', 'id' => $kategoria->id])];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="podkategoria-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <h2>Zestawy:</h2>
    <?php
	if(!Yii::$app->user->isGuest)
	{
		$userId = Yii::$app->user->identity->id;
	}
	else
	{
		$userId = 1;
	}
	
	$dataProvider = new ActiveDataProvider([
	    'query' => Zestaw::find()->where(['and', ['podkategoria_id' => $model->id], ['or', ['konto_id' => 1], ['konto_id' => $userId,]]]),
	]);
    ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'nazwa:text:Nazwa zestawu',

            ['class' => 'yii\grid\ActionColumn', 'controller' => 'test', 'template' => '{view}',],
        ],
    ]); ?>

</div>
