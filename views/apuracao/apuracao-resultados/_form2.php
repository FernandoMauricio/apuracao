<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\apuracao\ApuracaoResultados */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="apuracao-resultados-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'apure_mes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apure_unidade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apure_acaorealizada')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'apure_local')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'apure_datarealizacao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apure_motivo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apure_publico')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apure_qntpessoas')->textInput() ?>

    <?= $form->field($model, 'apure_parceiros')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apure_acaocomplementar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apure_src_arquivo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apure_usuariocriacao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apure_datacriacao')->textInput() ?>

    <?= $form->field($model, 'tema_id')->textInput() ?>

    <?= $form->field($model, 'situacao_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
