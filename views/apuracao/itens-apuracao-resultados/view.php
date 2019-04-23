<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\apuracao\ItensApuracaoResultados;

/* @var $this yii\web\View */
/* @var $model app\models\apuracao\ItensApuracaoResultados */

$this->title = $model->apure_id;
$this->params['breadcrumbs'][] = ['label' => 'Apuração dos Resultados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="itens-apuracao-resultados-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->apure_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Deletar', ['delete', 'id' => $model->apure_id], [
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
            'apure_ano',
            'apure_mes',
            'apure_unidade',
        ],
    ]) ?>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
    <?php foreach ($temas as $i => $tema) : ?>
    <?php $apuracao = ItensApuracaoResultados::find()->where(['apuracao_id' => $model->apure_id])->andWhere(['tema_id' => $i+1])->one(); ?>
        <div class="panel-heading" role="tab" id="heading<?=$i+1?>">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$i+1?>" aria-expanded="true" aria-controls="heading<?=$i+1?>">
                    <?= $tema->tema_descricao; ?>
                </a>
            </h4>
        </div>

        <div id="collapse<?=$i+1?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="collapse<?=$i+1?>">
            <div class="panel-body">
                <?= DetailView::widget([
                    'model' => $apuracao,
                    'attributes' => [
                        'item_apure_acaorealizada',
                        'item_apure_local',
                        'item_apure_datarealizacao',
                        'item_apure_motivo',
                        'item_apure_publico',
                        'item_apure_qntpessoas',
                        'item_apure_parceiros',
                        'item_apure_acaocomplementar',
                    ],
                ]) ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>


</div>
