<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\apuracao\ApuracaoResultadosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="apuracao-resultados-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'apure_id') ?>

    <?= $form->field($model, 'apure_mes') ?>

    <?= $form->field($model, 'apure_unidade') ?>

    <?= $form->field($model, 'apure_acaorealizada') ?>

    <?= $form->field($model, 'apure_local') ?>

    <?php // echo $form->field($model, 'apure_datarealizacao') ?>

    <?php // echo $form->field($model, 'apure_motivo') ?>

    <?php // echo $form->field($model, 'apure_publico') ?>

    <?php // echo $form->field($model, 'apure_qntpessoas') ?>

    <?php // echo $form->field($model, 'apure_parceiros') ?>

    <?php // echo $form->field($model, 'apure_acaocomplementar') ?>

    <?php // echo $form->field($model, 'apure_src_arquivo') ?>

    <?php // echo $form->field($model, 'apure_usuariocriacao') ?>

    <?php // echo $form->field($model, 'apure_datacriacao') ?>

    <?php // echo $form->field($model, 'tema_id') ?>

    <?php // echo $form->field($model, 'situacao_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
