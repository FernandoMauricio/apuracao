<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\apuracao\ItensApuracaoResultados;
use app\models\apuracao\TemaAtividade;

/* @var $this yii\web\View */
/* @var $model app\models\apuracao\ItensApuracaoResultados */

$session = Yii::$app->session;
\yii\web\YiiAsset::register($this);
?>
<div class="itens-apuracao-resultados-view">

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
    <?php foreach ($model->itensApuracaoResultados as $i => $itensApuracaoResultado) : ?>
        <div class="panel-heading" role="tab" id="heading<?=$key.'-'.$i?>">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$key.'-'.$i?>" aria-expanded="true" aria-controls="heading<?=$key.'-'.$i?>">
                    <?= $itensApuracaoResultado->temaAtividade->tema_descricao; ?>
                </a>
            </h4>
        </div>

        <div id="collapse<?=$key.'-'.$i?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="collapse<?=$key.'-'.$i?>">
            <div class="panel-body">
                <?= DetailView::widget([
                    'model' => $itensApuracaoResultado,
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
        <?php $key++;?>
        <?php endforeach; ?>

    </div>
</div>

</div>
