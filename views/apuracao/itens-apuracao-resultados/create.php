<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\apuracao\ItensApuracaoResultados */

$this->title = 'Create Itens Apuracao Resultados';
$this->params['breadcrumbs'][] = ['label' => 'Itens Apuracao Resultados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="itens-apuracao-resultados-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'temas' => $temas,
        'apuracaoResultado' => $apuracaoResultado,
    ]) ?>

</div>
