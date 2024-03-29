<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Słówka!',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Strona główna', 'url' => ['/site/index']],
		['label' => 'Języki', 'url' => ['/jezyk'], 'visible' => (!Yii::$app->user->isGuest && Yii::$app->user->identity->dostep == 1),],
		['label' => 'Kategorie', 'url' => ['/kategoria'], 'visible' => (!Yii::$app->user->isGuest && Yii::$app->user->identity->dostep == 1),],
		['label' => 'Podkategorie', 'url' => ['/podkategoria'], 'visible' => (!Yii::$app->user->isGuest && Yii::$app->user->identity->dostep == 1),],
		['label' => 'Zestawy', 'url' => ['/zestaw'], 'visible' => (!Yii::$app->user->isGuest && Yii::$app->user->identity->dostep == 1),],
		['label' => 'Wyniki', 'url' => ['/wynik'], 'visible' => (!Yii::$app->user->isGuest && Yii::$app->user->identity->dostep == 1),],
		['label' => 'Użytkownicy', 'url' => ['/user'], 'visible' => (!Yii::$app->user->isGuest && Yii::$app->user->identity->dostep == 1), ],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Zaloguj', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Wyloguj (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Krzysztof Kulewski- Słówka! <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
