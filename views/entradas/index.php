<?php

use app\models\Entradas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\EntradasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Entradas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entradas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Entradas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php 
    echo !Yii::$app->user->isGuest && Yii::$app->user->identity->perfil_id == 2
    ? $this->render("_search", ["model" => $searchModel])
    : ''; ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'horaEntrada',
            'horaSalida',
            'usuario_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Entradas $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
