<?php

namespace app\controllers;

use Yii;
use app\models\KaryawanRekening;
use app\models\KaryawanRekeningSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KaryawanRekeningController implements the CRUD actions for KaryawanRekening model.
 */
class KaryawanRekeningController extends Controller
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
     * Lists all KaryawanRekening models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KaryawanRekeningSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single KaryawanRekening model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new KaryawanRekening model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new KaryawanRekening();
        $idKaryawan = Yii::$app->request->get('id_karyawan');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($idKaryawan !== null) {
                return $this->redirect(['karyawan/view', 'id' => $idKaryawan, '#' => 'w1-dd2-tab9']);
            } else {
                return $this->redirect(['view', 'id' => $model->id_rekening]);
            }
        } else {
            if (Yii::$app->request->isAjax === true) {
                return $this->renderAjax('create', [
                    'model' => $model,
                    'id_karyawan' => $idKaryawan
                ]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'id_karyawan' => $idKaryawan
                ]);
            }
        }
    }

    /**
     * Updates an existing KaryawanRekening model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $idKaryawan = Yii::$app->request->get('id_karyawan');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($idKaryawan !== null) {
                return $this->redirect(['karyawan/view', 'id' => $idKaryawan, '#' => 'w1-dd2-tab9']);
            } else {
                return $this->redirect(['view', 'id' => $model->id_rekening]);
            }
        } else {
            if (Yii::$app->request->isAjax === true) {
                return $this->renderAjax('update', [
                    'model' => $model,
                    'id_karyawan' => $idKaryawan
                ]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                    'id_karyawan' => $idKaryawan
                ]);
            }
        }
    }

    /**
     * Deletes an existing KaryawanRekening model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $idKaryawan = Yii::$app->request->get('id_karyawan');
        $this->findModel($id)->delete();
        if ($idKaryawan !== null) {
            return $this->redirect(['karyawan/view', 'id' => $idKaryawan, '#' => 'w1-dd2-tab9']);
        } else {
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the KaryawanRekening model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KaryawanRekening the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KaryawanRekening::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
