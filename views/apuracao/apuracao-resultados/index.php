<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\apuracao\ApuracaoResultadosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Apuracao Resultados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apuracao-resultados-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Apuracao Resultados', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'apure_id',
            'apure_mes',
            'apure_unidade',
            'apure_acaorealizada:ntext',
            'apure_local:ntext',
            //'apure_datarealizacao',
            //'apure_motivo',
            //'apure_publico',
            //'apure_qntpessoas',
            //'apure_parceiros',
            //'apure_acaocomplementar',
            //'apure_src_arquivo',
            //'apure_usuariocriacao',
            //'apure_datacriacao',
            //'tema_id',
            //'situacao_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
