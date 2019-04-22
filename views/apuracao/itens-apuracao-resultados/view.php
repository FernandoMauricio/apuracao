<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\apuracao\ItensApuracaoResultados */

$this->title = $model->item_apure_id;
$this->params['breadcrumbs'][] = ['label' => 'Itens Apuracao Resultados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="itens-apuracao-resultados-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->item_apure_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->item_apure_id], [
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
            'item_apure_id',
            'item_apure_acaorealizada:ntext',
            'item_apure_local:ntext',
            'item_apure_datarealizacao',
            'item_apure_motivo',
            'item_apure_publico',
            'item_apure_qntpessoas',
            'item_apure_parceiros',
            'item_apure_acaocomplementar',
            'item_apure_src_arquivo',
            'tema_id',
            'apuracao_id',
        ],
    ]) ?>

</div>
