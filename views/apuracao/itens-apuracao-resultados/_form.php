<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $itensApuracao app\itensApuracaos\apuracao\ItensApuracaoResultados */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="itens-apuracao-resultados-form">

    <?php $form = ActiveForm::begin(); ?>
     <?php echo $form->errorSummary($itensApuracao); ?>  

<div class="panel-body">
    <div class="row">
        <div class="col-md-4">

            <?php
                echo $form->field($model, 'apure_ano')->widget(Select2::classname(), [
                    'data' =>  [
                        '2019'=>'2019', 
                    ],
                    'options' => ['placeholder' => 'Selecione o ano...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
            ?>
        </div>

        <div class="col-md-4">
            <?php
                echo $form->field($model, 'apure_mes')->widget(Select2::classname(), [
                    'data' =>  [
                        'Janeiro'=>'Janeiro', 
                        'Fevereiro' => 'Fevereiro', 
                        'Março'=>'Março', 
                        'Abril'=>'Abril',
                        'Maio'=>'Maio',
                        'Junho'=>'Junho',
                        'Julho'=>'Julho',
                        'Agosto'=>'Agosto',
                        'Setembro'=>'Setembro',
                        'Outubro'=>'Outubro',
                        'Novembro'=>'Novembro',
                        'Dezembro'=>'Dezembro',
                    ],
                    'options' => ['placeholder' => 'Selecione o mês...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
            ?>
        </div>
    </div>
</div>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
    <?php foreach ($temas as $i => $tema) : ?>

        <div class="panel-heading" role="tab" id="heading<?=$i+1?>">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$i+1?>" aria-expanded="true" aria-controls="heading<?=$i+1?>">
                    <?= $tema->tema_descricao; ?>
                </a>
            </h4>
        </div>
        <div id="collapse<?=$i+1?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapse<?=$i+1?>">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <?= $form->field($itensApuracao, "[{$i}]item_apure_acaorealizada")->textarea(['rows' => 3]) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <?= $form->field($itensApuracao, "[{$i}]item_apure_local")->textarea(['rows' => 3]) ?>
                    </div>

                    <div class="col-md-4">
                        <?= $form->field($itensApuracao, "[{$i}]item_apure_datarealizacao")->textarea(['maxlength' => true, 'rows' => 3]) ?>
                    </div>

                    <div class="col-md-4">
                        <?= $form->field($itensApuracao, "[{$i}]item_apure_motivo")->textarea(['maxlength' => true, 'rows' => 3]) ?>
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <?= $form->field($itensApuracao, "[{$i}]item_apure_publico")->textarea(['maxlength' => true, 'rows' => 3]) ?>
                    </div>

                    <div class="col-md-3">
                        <?= $form->field($itensApuracao, "[{$i}]item_apure_qntpessoas")->textarea(['maxlength' => true, 'rows' => 3]) ?>
                    </div>

                    <div class="col-md-3">
                        <?= $form->field($itensApuracao, "[{$i}]item_apure_parceiros")->textarea(['maxlength' => true, 'rows' => 3]) ?>
                    </div>

                    <div class="col-md-3">
                        <?= $form->field($itensApuracao, "[{$i}]item_apure_acaocomplementar")->textarea(['maxlength' => true, 'rows' => 3]) ?>
                    </div>

                    <?= $form->field($itensApuracao, "[{$i}]tema_id")->hiddenInput(['value' => $tema->tema_id])->label(false)  ?>

                </div>

            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
