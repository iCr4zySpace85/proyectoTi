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
<script src="https://kit.fontawesome.com/a85adf3762.js" crossorigin="anonymous"></script>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100 ">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => 'IDANA',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar navbar-expand-lg navbar-light ']
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
                        ?['label' => 'Registros', 'url' => ['/entradas/index']]
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
                : '<li>'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Cerrar',
                        ['class' => ' btn btn-link logout  ']
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

<!-- Footer -->
<footer class="bg-dark text-center text-white">
    
  <!-- Grid container -->
  <div class="container p-4">

    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="https://www.facebook.com/profile.php?id=100059176121059" role="button"><i class="fa-brands fa-facebook"></i></a>

      <!-- Twitter -->
      <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee" href="https://twitter.com/uthuejotzingo?fbclid=IwAR1-2LDGJnyjRma_fxw75y1eRTpLlt2UJpZ9rcaaIlklQNv3NtEHM-OtbCc" role="button"><i class="fab fa-twitter"></i></a>

      <!-- Google -->
      <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39" href="https://www.uth.edu.mx/?fbclid=IwAR1sitiHh7jPpyC5wyCwCNn0Er7duUXN83GlvA6hKO_CS7L8jX5hCAA8P68" role="button"><i class="fab fa-google"></i></a>

      <!-- Instagram -->
      <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac" href="https://www.instagram.com/ut__huejotzingo/?fbclid=IwAR3975fI8XGUgfmbH9s5-6__rJGi7IJbyQKf0qg9jzfUZ_Aq9ObM2-NhhEQ" role="button"><i class="fab fa-instagram"></i></a>

      <!-- tik tok -->
      <a class="btn btn-primary btn-floating m-1" style="background-color: #333333" href="#!" role="button"><i class="fa-brands fa-tiktok"></i></a>
    </section>
    <!-- Section: Social media -->




  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
    © 2020 Copyright:
    <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
