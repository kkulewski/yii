<?php

namespace frontend\controllers;

use Yii;
use common\models\Zestaw;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ZestawController implements the CRUD actions for Zestaw model.
 */
class ZestawController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Zestaw models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([ 'query' => Zestaw::find(), ]);

        return $this->render('index', [ 'dataProvider' => $dataProvider, ]);
    }

    /**
     * Displays a single Zestaw model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [ 'model' => $this->findModel($id), ]);
    }

    /**
     * Creates a new Zestaw model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Zestaw();

        if ($model->load(Yii::$app->request->post()) && $model->save()) 
		{
            return $this->redirect(['view', 'id' => $model->id_zestaw]);
        } else 
		{
            return $this->render('create', [ 'model' => $model, ]);
        }
    }

    /**
     * Updates an existing Zestaw model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) 
		{
            return $this->redirect(['view', 'id' => $model->id_zestaw]);
        } else 
		{
            return $this->render('update', [ 'model' => $model, ]);
        }
    }

    /**
     * Deletes an existing Zestaw model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Zestaw model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Zestaw the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Zestaw::findOne($id)) !== null) 
		{
            return $model;
        } else 
		{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
