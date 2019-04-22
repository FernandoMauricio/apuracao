<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\apuracao\ApuracaoResultados */

$this->title = $model->apure_id;
$this->params['breadcrumbs'][] = ['label' => 'Apuracao Resultados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="apuracao-resultados-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->apure_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->apure_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'apure_id',
            'apure_mes',
            'apure_unidade',
            'apure_acaorealizada:ntext',
            'apure_local:ntext',
            'apure_datarealizacao',
            'apure_motivo',
            'apure_publico',
            'apure_qntpessoas',
            'apure_parceiros',
            'apure_acaocomplementar',
            'apure_src_arquivo',
            'apure_usuariocriacao',
            'apure_datacriacao',
            'tema_id',
            'situacao_id',
        ],
    ]) ?>

</div>
