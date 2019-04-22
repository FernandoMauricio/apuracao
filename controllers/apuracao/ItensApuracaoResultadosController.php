<?php

namespace app\controllers\apuracao;

use Yii;
use app\models\apuracao\ApuracaoResultados;
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
        $searchModel = new ItensApuracaoResultadosSearch();
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
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ItensApuracaoResultados model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $session = Yii::$app->session;
        $model = new ItensApuracaoResultados();
        $apuracaoResultado = new ApuracaoResultados();
        $temas = TemaAtividade::find()->where(['tema_status' => 1])->all();

        $apuracaoResultado->apure_datacriacao = date('Y-m-d H:i:s');
        $apuracaoResultado->apure_usuariocriacao = $session['sess_nomeusuario'];
        $apuracaoResultado->apure_unidade = $session['sess_unidade'];
        $apuracaoResultado->situapuracao_id = 1; //Em elaboração

        if ($model->load(Yii::$app->request->post())) {
            return $this->redirect(['view', 'id' => $model->item_apure_id]);
        }

        return $this->render('create', [
            'model' => $model,
            'temas' => $temas,
            'apuracaoResultado' => $apuracaoResultado,
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->item_apure_id]);
        }

        return $this->render('update', [
            'model' => $model,
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
        if (($model = ItensApuracaoResultados::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
