<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\apuracao\ItensApuracaoResultadosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Itens Apuracao Resultados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="itens-apuracao-resultados-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Itens Apuracao Resultados', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'item_apure_id',
            'item_apure_acaorealizada:ntext',
            'item_apure_local:ntext',
            'item_apure_datarealizacao',
            'item_apure_motivo',
            //'item_apure_publico',
            //'item_apure_qntpessoas',
            //'item_apure_parceiros',
            //'item_apure_acaocomplementar',
            //'item_apure_src_arquivo',
            //'tema_id',
            //'apuracao_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
