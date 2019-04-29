<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\apuracao\ItensApuracaoResultadosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Apuração dos Resultados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="itens-apuracao-resultados-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
         <?= Html::button('Nova Apuração', ['value'=> Url::to(['gerar-apuracao']), 'class' => 'btn btn-success', 'id'=>'modalButton']) ?>
    </p>

<?php
    Modal::begin([
        'options' => ['tabindex' => false ], // important for Select2 to work properly
        'clientOptions' => ['backdrop' => 'static', 'keyboard' => true],
        'header' => '<h4>Nova Apuração</h4>',
        'id' => 'modal',
        'size' => 'modal-lg',
        ]);
    echo "<div id='modalContent'></div>";
    Modal::end();
?>

<?php
    $gridColumns = [

        [
            'class'=>'kartik\grid\ExpandRowColumn',
            'width'=>'50px',
            'format' => 'raw',
            'value'=>function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            'detail'=>function ($model, $key, $index, $column) {
                return Yii::$app->controller->renderPartial('view-expand', ['model'=>$model, 'apuracaoResultados' => $model->itensApuracaoResultados, 'key'=>$key,
        ]);
            },
            'headerOptions'=>['class'=>'kartik-sheet-style'], 
            'expandOneOnly'=>true
        ],

        'apure_id',
        'apure_ano',
        'apure_mes',
        'apure_unidade',

        ['class' => 'yii\grid\ActionColumn'],

        ];
?>

<?php Pjax::begin(); ?>
<?php 
    echo GridView::widget([
    'dataProvider'=>$dataProvider,
    'filterModel'=>$searchModel,
    'columns'=>$gridColumns,
    'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
    'headerRowOptions'=>['class'=>'kartik-sheet-style'],
    'filterRowOptions'=>['class'=>'kartik-sheet-style'],
    'pjax'=>true, // pjax is set to always true for this demo

    'beforeHeader'=>[
        [
            'columns'=>[
                ['content'=>'Detalhes - Apurações dos Resultados', 'options'=>['colspan'=>5, 'class'=>'text-center warning']], 
                ['content'=>'Área de Ações', 'options'=>['colspan'=>1, 'class'=>'text-center warning']], 
            ],
        ]
    ],
        'hover' => true,
        'panel' => [
        'type'=>GridView::TYPE_PRIMARY,
        'heading'=> '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> Listagem - Apuração dos Resultados</h3>',
        ],
    ]);
?>
<?php Pjax::end(); ?>

</div>
