<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use common\models\Jezyk;
use common\models\Podkategoria;
use common\models\Zestaw;
use backend\models\ZestawSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\helpers\ArrayHelper;

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
        $searchModel = new ZestawSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Zestaw model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Zestaw model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Zestaw();
		$konta = User::find()->orderBy('username')->all();
		$konta = ArrayHelper::map($konta, 'id', 'username');
		$jezyki1 = Jezyk::find()->orderBy('nazwa')->all();
		$jezyki1 = ArrayHelper::map($jezyki1, 'id', 'nazwa');
		$jezyki2 = Jezyk::find()->orderBy('nazwa')->all();
		$jezyki2 = ArrayHelper::map($jezyki2, 'id', 'nazwa');
		$podkategorie = Podkategoria::find()->orderBy('nazwa')->all();
		$podkategorie = ArrayHelper::map($podkategorie, 'id', 'nazwa');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
				'konta' => $konta,
				'jezyki1' => $jezyki1,
				'jezyki2' => $jezyki2,
				'podkategorie' => $podkategorie,
            ]);
        }
    }

    /**
     * Updates an existing Zestaw model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$konta = User::find()->orderBy('username')->all();
		$konta = ArrayHelper::map($konta, 'id', 'username');
		$jezyki1 = Jezyk::find()->orderBy('nazwa')->all();
		$jezyki1 = ArrayHelper::map($jezyki1, 'id', 'nazwa');
		$jezyki2 = Jezyk::find()->orderBy('nazwa')->all();
		$jezyki2 = ArrayHelper::map($jezyki2, 'id', 'nazwa');
		$podkategorie = Podkategoria::find()->orderBy('nazwa')->all();
		$podkategorie = ArrayHelper::map($podkategorie, 'id', 'nazwa');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
				'konta' => $konta,
				'jezyki1' => $jezyki1,
				'jezyki2' => $jezyki2,
				'podkategorie' => $podkategorie,
            ]);
        }
    }

    /**
     * Deletes an existing Zestaw model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
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
     * @param string $id
     * @return Zestaw the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Zestaw::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
