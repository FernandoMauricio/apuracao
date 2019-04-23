<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\apuracao\ItensApuracaoResultados */

$this->title = 'Update Itens Apuracao Resultados: ' . $model->apure_id;
$this->params['breadcrumbs'][] = ['label' => 'Itens Apuracao Resultados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->apure_id, 'url' => ['view', 'id' => $model->apure_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="itens-apuracao-resultados-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'temas' => $temas,
    ]) ?>

</div>
