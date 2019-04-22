<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\apuracao\ApuracaoResultados */

$this->title = 'Nova Apuração de Resultados';
$this->params['breadcrumbs'][] = ['label' => 'Apuração de Resultados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apuracao-resultados-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'temas' => $temas,
    ]) ?>

</div>
