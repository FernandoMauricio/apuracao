<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\apuracao\ItensApuracaoResultadosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="itens-apuracao-resultados-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'item_apure_id') ?>

    <?= $form->field($model, 'item_apure_acaorealizada') ?>

    <?= $form->field($model, 'item_apure_local') ?>

    <?= $form->field($model, 'item_apure_datarealizacao') ?>

    <?= $form->field($model, 'item_apure_motivo') ?>

    <?php // echo $form->field($model, 'item_apure_publico') ?>

    <?php // echo $form->field($model, 'item_apure_qntpessoas') ?>

    <?php // echo $form->field($model, 'item_apure_parceiros') ?>

    <?php // echo $form->field($model, 'item_apure_acaocomplementar') ?>

    <?php // echo $form->field($model, 'item_apure_src_arquivo') ?>

    <?php // echo $form->field($model, 'tema_id') ?>

    <?php // echo $form->field($model, 'apuracao_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
