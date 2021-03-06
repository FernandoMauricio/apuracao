<?php

namespace app\controllers\apuracao;

use Yii;
use app\models\apuracao\ApuracaoResultados;
use app\models\apuracao\ApuracaoResultadosSearch;
use app\models\apuracao\TemaAtividade;
use app\models\apuracao\ItensApuracaoResultados;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ApuracaoResultadosController implements the CRUD actions for ApuracaoResultados model.
 */
class ApuracaoResultadosController extends Controller
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
     * Lists all ApuracaoResultados models.
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
     * Displays a single ApuracaoResultados model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ApuracaoResultados model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $session = Yii::$app->session;
        $model = new ApuracaoResultados();
        $modelsItensApuracaoResultados = [new ItensApuracaoResultados];
        $temas = TemaAtividade::find()->where(['tema_status' => 1])->all();


        $model->apure_datacriacao = date('Y-m-d H:i:s');
        $model->apure_usuariocriacao = $session['sess_nomeusuario'];
        $model->apure_unidade = $session['sess_unidade'];
        $model->situapuracao_id = 1; //Em elaboração

        if ($modelsItensApuracaoResultados->load(Yii::$app->request->post())) {
            return $this->redirect(['view', 'id' => $model->apure_id]);
        }

        return $this->render('create', [
            'model' => $model,
            'temas' => $temas,
            'modelsItensApuracaoResultados' => (empty($modelsItensApuracaoResultados)) ? [new ItensApuracaoResultados] : $modelsItensApuracaoResultados,
        ]);
    }

    /**
     * Updates an existing ApuracaoResultados model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->apure_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ApuracaoResultados model.
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
     * Finds the ApuracaoResultados model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ApuracaoResultados the loaded model
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
