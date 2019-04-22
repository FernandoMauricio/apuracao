<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\apuracao\ApuracaoResultados */

$this->title = 'Update Apuracao Resultados: ' . $model->apure_id;
$this->params['breadcrumbs'][] = ['label' => 'Apuracao Resultados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->apure_id, 'url' => ['view', 'id' => $model->apure_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="apuracao-resultados-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
