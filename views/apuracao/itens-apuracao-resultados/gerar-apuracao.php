<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

?>

<div class="gerar-apuracao">

  <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['options'=>['target'=>'_blank']]); ?>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                <?php
                    $data_ano = ArrayHelper::map($temas, 'tema_id', 'tema_descricao');
                    echo $form->field($model, 'tema_id')->widget(Select2::classname(), [
                            'data' =>  $data_ano,
                            'options' => ['placeholder' => 'Selecione o Tema...', 'multiple'=>true],
                            'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]);
                ?>
				</div>

			</div>

        <?= Html::a('Gerar Apuração', ['gerar-apuracao'], [
            'class' => 'btn btn-success',
            'data' => [
                'method' => 'post',
            ],
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>