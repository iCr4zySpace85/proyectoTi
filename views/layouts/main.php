<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => 'AIDANA',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [

            Yii::$app->user->isGuest 
                ? ['label' => 'Inicio', 'url' => ['/site/index']]
           
                :(
                    Yii::$app->user->identity->perfil_id == 2
                        ?['label' => 'Inicio', 'url' => ['/site/index']]
                        :['label' => 'Inicio', 'url' => ['/site/index']]
                ),

            Yii::$app->user->isGuest 
                ? ['label' => 'Contactos', 'url' => ['/site/contact']]
           
                :(
                    Yii::$app->user->identity->perfil_id == 2
                        ?['label' => 'Usuarios', 'url' => ['/usuario/index']]
                        :['label' => '', 'url' => ['/entradas/index']]
                ),
           
            Yii::$app->user->isGuest 
                ? ['label' => '', 'url' => ['/usuario/create']]
           
                :(
                    Yii::$app->user->identity->perfil_id == 2
                        ?['label' => 'Entradas', 'url' => ['/entradas/index']]
                        :['label' => '', 'url' => ['/site/contact']]
                ),
//eventos+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


!Yii::$app->user->isGuest && Yii::$app->user->identity->perfil_id == 1
? (['label' => 'Registros', 'url' => ['EntradasSearch[usuario_id]' => Yii::$app->user->identity->id,'/entradas/index']]
) : (''),

//*************************************************************************** */
            Yii::$app->user->isGuest 
                ? ['label' => '', 'url' => ['/site/index']]
           
                :(
                    Yii::$app->user->identity->perfil_id == 2
                        ?['label' => 'Contactos', 'url' => ['/site/contact']]
                        :['label' => '', 'url' => ['/site/index']]
                ),

           
       
            Yii::$app->user->isGuest
                ? ['label' => 'Login', 'url' => ['/site/login']]
                : '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => ' btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
        ]
    ]);
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-dark">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; My Company <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
