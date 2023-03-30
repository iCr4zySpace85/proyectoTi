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
        <?php // Html::a('Create Entradas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

 

    <?php

    if (Yii::$app->user->identity->perfil_id != 2) {
        echo
        GridView::widget([
            'dataProvider' => $dataProvider,
           // 'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
    
               /**'usuario_id', */ 
                [
                    'attribute' => 'Usuario',
                    'value' => function($model)
                    {
                        return $model->getNombre()->username;
                    }
                ],
                'horaEntrada',
                'horaSalida',
               
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, Entradas $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                     }
                ],
            ],
        ]);
    }else{
        echo
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
    
               /** */ 'usuario_id',
                // [
                //     'attribute' => 'Usuario',
                //     'value' => function($model)
                //     {
                //         return $model->getNombre()->username;
                //     }
                // ],
                'horaEntrada',
                'horaSalida',
               
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, Entradas $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                     }
                ],
            ],
        ]);
    }

     ?>


</div>
