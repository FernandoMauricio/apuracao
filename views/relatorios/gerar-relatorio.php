<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

?>

<div class="gerar-relatorio">

  <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['options'=>['target'=>'_blank']]); ?>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-2">
                    <?php
                        echo $form->field($model, 'relat_ano')->widget(Select2::classname(), [
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

                <div class="col-md-2">
                    <?php
                        echo $form->field($model, 'relat_mes')->widget(Select2::classname(), [
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

                <div class="col-md-3">
                    <?php
                        $data_unidades = ArrayHelper::map($unidades, 'uni_nomeabreviado', 'uni_nomeabreviado');
                        echo $form->field($model, 'relat_unidade')->widget(Select2::classname(), [
                            'data' =>  $data_unidades,
                            'options' => ['placeholder' => 'Selecione a Unidade...', 'multiple'=>true],
                            'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]);
                    ?>
                </div>

                <div class="col-md-5">
                    <?php
                        $data_ano = ArrayHelper::map($temas, 'tema_id', 'tema_descricao');
                        echo $form->field($model, 'relat_tema')->widget(Select2::classname(), [
                            'data' =>  $data_ano,
                            'options' => ['placeholder' => 'Selecione o Tema...', 'multiple'=>true],
                            'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]);
                    ?>
                </div>

            </div>

        <?= Html::a('Gerar Relatório', ['gerar-relatorio'], [
            'class' => 'btn btn-success',
            'data' => [
                'method' => 'post',
            ],
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>