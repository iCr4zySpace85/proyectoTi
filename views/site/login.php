<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;


$this->title = 'Iniciar Sesión';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>

    dody{
        background-color: #E8ECF2;
    }

    .img{
        background-image: url('../img/global.jpg');
        background-position: center ;
        background-size: cover;
    }

</style>

<div class="site-login container w-75 mt-3 rounded shadow-lg ">
    <div class="row align-items-stretch">

        <div class="col p-5">
            
            <div class="text-center"> 
                <img src="../img/logo.png" width="70" alt="" srcset="">
            </div>
            
            <h1 class="fw-bold text-center"><?= Html::encode($this->title) ?></h1>
            
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3 text-center'],
                    'inputOptions' => ['class' => 'col-lg-3 form-control m-0 text-center'],
                    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                ],
            ]); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => "Nombre de usuario", ]) ?>

                <?= $form->field($model, 'password')->passwordInput(['placeholder' => "Contraseña"])?>

                <div class="form-group ">
                    <div class="text-center">
                        <?= Html::submitButton('Iniciar', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                </div>

            <?php ActiveForm::end(); ?>

            <p class="text-center my-3"><?= Html::a('¿Olvidaste tu contraseña?', ['/usuario/create'], ['class' => 'profile-link']) ?></p>
        </div>


        <div class="col img d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded"></div>

    </div>
    
</div>