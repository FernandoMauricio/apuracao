<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\apuracao\ItensApuracaoResultados;
$session = Yii::$app->session;
?>

<?php foreach ($apuracaoUnidades as $i => $apuracaoUnidade) : ?>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> <?= $apuracaoUnidade->apure_unidade?> </h3>
  </div>
    <div class="panel-body">
    <?= DetailView::widget([
        'model' => $apuracaoUnidade,
        'attributes' => [
            'apure_id',
            'apure_ano',
            'apure_mes',
        ],
    ]) ?>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-warning">
    <?php $apuracao = ItensApuracaoResultados::find()->where(['apuracao_id' => $apuracaoUnidade->apure_id])->all(); ?>
    <?php foreach ($apuracao as $i => $itensApuracaoResultado) : ?>
        <div class="panel-heading" role="tab" id="heading<?=$apuracaoUnidade->apure_id.'-'.$i?>">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$apuracaoUnidade->apure_id.'-'.$i?>" aria-expanded="true" aria-controls="heading<?=$apuracaoUnidade->apure_id.'-'.$i?>">
                    <?= $itensApuracaoResultado->temaAtividade->tema_descricao; ?>
                </a>
            </h4>
        </div>

        <div id="collapse<?=$apuracaoUnidade->apure_id.'-'.$i?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapse<?=$apuracaoUnidade->apure_id.'-'.$i?>">
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
        <?php $apuracaoUnidade->apure_id++;?>
        <?php endforeach; ?>
    </div>
</div>
    </div>
</div>


<?php endforeach; ?>

