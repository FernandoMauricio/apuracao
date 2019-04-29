<?php

namespace app\controllers\apuracao;

use Yii;
use app\models\apuracao\ApuracaoResultados;
use app\models\apuracao\ApuracaoResultadosSearch;
use app\models\apuracao\ItensApuracaoResultados;
use app\models\apuracao\ItensApuracaoResultadosSearch;
use app\models\apuracao\TemaAtividade;  
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ItensApuracaoResultadosController implements the CRUD actions for ItensApuracaoResultados model.
 */
class ItensApuracaoResultadosController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ItensApuracaoResultados models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ApuracaoResultadosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ItensApuracaoResultados model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $temas = TemaAtividade::find()->where(['tema_status' => 1])->all();

        return $this->render('view', [
            'temas' => $temas,
            'model' => $model,
        ]);
    }

    public function actionGerarApuracao()
    {
        $session = Yii::$app->session;
        $model = new ItensApuracaoResultados;

        $temas = TemaAtividade::find()->all();
      // $tipoProgramacao  = Tipoprogramacao::find()->all();
      // $tipoPlanilha     = Tipoplanilha::find()->all();
      // $situacaoPlanilha = Situacaoplanilha::find()->all();
      // $tipoRelatorio    = Tiporelatorio::find()->orderBy(['tiprel_descricao'=>SORT_ASC])->all();

        if ($model->load(Yii::$app->request->post())) {

            $session->set('sess_temas', $model->tema_id);

            return $this->redirect(['create']);
        }else{
            return $this->renderAjax('gerar-apuracao', [
                'model' => $model,
                'temas' => $temas,
            ]);
        }
    }

    /**
     * Creates a new ItensApuracaoResultados model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $session = Yii::$app->session;
        $itensApuracao = new ItensApuracaoResultados();
        $model = new ApuracaoResultados();
        $temas = TemaAtividade::find()->where(['IN', 'tema_id', $session['sess_temas']])->all();

        $model->apure_datacriacao = date('Y-m-d H:i:s');
        $model->apure_usuariocriacao = $session['sess_nomeusuario'];
        $model->apure_unidade = $session['sess_unidade'];
        $model->situapuracao_id = 1; //Em elaboração

        if ($itensApuracao->load(Yii::$app->request->post()) && $model->load(Yii::$app->request->post()) && $model->save()) {

            foreach($_POST['ItensApuracaoResultados'] as $i => $apuracao){
                $itensApuracao =  new ItensApuracaoResultados();
                $itensApuracao->apuracao_id = $model->apure_id;
                $itensApuracao->item_apure_acaorealizada = $_POST['ItensApuracaoResultados'][$i]['item_apure_acaorealizada'];
                $itensApuracao->item_apure_local = $_POST['ItensApuracaoResultados'][$i]['item_apure_local'];
                $itensApuracao->item_apure_datarealizacao = $_POST['ItensApuracaoResultados'][$i]['item_apure_datarealizacao'];
                $itensApuracao->item_apure_motivo = $_POST['ItensApuracaoResultados'][$i]['item_apure_motivo'];
                $itensApuracao->item_apure_publico = $_POST['ItensApuracaoResultados'][$i]['item_apure_publico'];
                $itensApuracao->item_apure_qntpessoas = $_POST['ItensApuracaoResultados'][$i]['item_apure_qntpessoas'];
                $itensApuracao->item_apure_parceiros = $_POST['ItensApuracaoResultados'][$i]['item_apure_parceiros'];
                $itensApuracao->item_apure_acaocomplementar = $_POST['ItensApuracaoResultados'][$i]['item_apure_acaocomplementar'];
                $itensApuracao->tema_id = $_POST['ItensApuracaoResultados'][$i]['tema_id'];
                $itensApuracao->save(false);
            }
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'temas' => $temas,
            'itensApuracao' => $itensApuracao,
        ]);
    }

    /**
     * Updates an existing ItensApuracaoResultados model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $temas = TemaAtividade::find()->where(['tema_status' => 1])->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

                foreach($_POST['ItensApuracaoResultados'] as $i => $apuracao){
                $connection = Yii::$app->db;
                $apuracao = ItensApuracaoResultados::find()->where(['apuracao_id' => $model->apure_id])->andWhere(['tema_id' => $i+1])->one();
                $command = $connection->createCommand('
                    UPDATE itens_apuracao_resultados 
                    SET item_apure_acaorealizada="'.$_POST['ItensApuracaoResultados'][$i]['item_apure_acaorealizada'].'", 
                        item_apure_local="'.$_POST['ItensApuracaoResultados'][$i]['item_apure_local'].'", 
                        item_apure_datarealizacao="'.$_POST['ItensApuracaoResultados'][$i]['item_apure_datarealizacao'].'", 
                        item_apure_motivo="'.$_POST['ItensApuracaoResultados'][$i]['item_apure_motivo'].'", 
                        item_apure_publico="'.$_POST['ItensApuracaoResultados'][$i]['item_apure_publico'].'", 
                        item_apure_qntpessoas="'.$_POST['ItensApuracaoResultados'][$i]['item_apure_qntpessoas'].'", 
                        item_apure_parceiros="'.$_POST['ItensApuracaoResultados'][$i]['item_apure_parceiros'].'", 
                        item_apure_acaocomplementar="'.$_POST['ItensApuracaoResultados'][$i]['item_apure_acaocomplementar'].'",
                        tema_id='.$_POST['ItensApuracaoResultados'][$i]['tema_id'].' 
                    WHERE 
                        apuracao_id='.$model->apure_id.'
                    AND 
                        tema_id='.$_POST['ItensApuracaoResultados'][$i]['tema_id'].'  ');
                $command->execute();
            }
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'temas' => $temas,
        ]);
    }

    /**
     * Deletes an existing ItensApuracaoResultados model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ItensApuracaoResultados model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ItensApuracaoResultados the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ApuracaoResultados::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
