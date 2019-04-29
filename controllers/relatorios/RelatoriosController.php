<?php

namespace app\controllers\relatorios;

use Yii;
use app\models\apuracao\TemaAtividade;
use app\models\relatorios\Relatorios;
use app\models\apuracao\ApuracaoResultados;
use app\models\base\Unidade;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;


class RelatoriosController extends Controller
{

    public function actionGerarRelatorio()
    {
        $session = Yii::$app->session;
    	$model = new Relatorios();
        $temas = TemaAtividade::find()->where(['tema_status' => 1])->all();
        $unidades = Unidade::find()->where(['uni_codsituacao' => 1])->orderBy('uni_nomeabreviado')->all();

        if ($model->load(Yii::$app->request->post())) {
            $session->set('sess_temas', $model->relat_tema);
            $session->set('sess_unidades', $model->relat_unidade);
            return $this->redirect(['relatorio-geral', 'relat_ano' => $model->relat_ano, 'relat_mes' => $model->relat_mes]);
        }else{
            return $this->render('/relatorios/gerar-relatorio', [
                'model'  => $model,
                'temas' => $temas,
                'unidades' => $unidades,
            ]);
        }
    }

    public function actionRelatorioGeral($relat_ano, $relat_mes)
    {
        $this->layout = 'main-imprimir';
        $apuracaoUnidades = $this->findModelApuracaoUnidades($relat_ano, $relat_mes);

        return $this->render('/relatorios/relatorio-geral', [
          'apuracaoUnidades'  => $apuracaoUnidades, 
        ]);
    }

    protected function findModelApuracaoUnidades($relat_ano, $relat_mes)
    {
        $session = Yii::$app->session;
        if (($apuracaoUnidades = ApuracaoResultados::find()->where(['apure_ano' => $relat_ano, 'apure_mes' => $relat_mes])->andWhere(['IN', 'apure_unidade', $session['sess_unidades']])->all()) !== null) {
            return $apuracaoUnidades;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}