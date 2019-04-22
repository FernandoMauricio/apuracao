<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\apuracao\ApuracaoResultados */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="apuracao-resultados-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php //echo $form->errorSummary($model); ?>  

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
                    <div class="col-md-3">
                        <?php
                            echo $form->field($model, "[{$i}]apure_mes")->widget(Select2::classname(), [
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
                    <div class="col-md-9">
                        <?= $form->field($model, "[{$i}]apure_acaorealizada")->textarea(['rows' => 3]) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <?= $form->field($model, "[{$i}]apure_local")->textarea(['rows' => 3]) ?>
                    </div>

                    <div class="col-md-3">
                        <?= $form->field($model, "[{$i}]apure_datarealizacao")->textarea(['maxlength' => true, 'rows' => 3]) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, "[{$i}]apure_motivo")->textarea(['maxlength' => true, 'rows' => 3]) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, "[{$i}]apure_publico")->textarea(['maxlength' => true, 'rows' => 3]) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <?= $form->field($model, "[{$i}]apure_qntpessoas")->textarea(['maxlength' => true, 'rows' => 3]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, "[{$i}]apure_parceiros")->textarea(['maxlength' => true, 'rows' => 3]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, "[{$i}]apure_acaocomplementar")->textarea(['maxlength' => true, 'rows' => 3]) ?>
                    </div>
                </div>


                <?= $form->field($model, "[{$i}]apure_src_arquivo")->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, "[{$i}]apure_usuariocriacao")->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, "[{$i}]apure_datacriacao")->textInput() ?>

                <?= $form->field($model, "[{$i}]tema_id")->textInput(['value' => $tema->tema_id]) ?>

                <?= $form->field($model, "[{$i}]situacao_id")->textInput() ?>

                <?= $form->field($model, "[{$i}]apure_unidade")->textInput(['maxlength' => true]) ?>

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
