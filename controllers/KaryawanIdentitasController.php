<?php

namespace app\controllers;

use Yii;
use app\models\KaryawanIdentitas;
use app\models\KaryawanIdentitasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KaryawanIdentitasController implements the CRUD actions for KaryawanIdentitas model.
 */
class KaryawanIdentitasController extends Controller
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
     * Lists all KaryawanIdentitas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KaryawanIdentitasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single KaryawanIdentitas model.
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
     * Creates a new KaryawanIdentitas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new KaryawanIdentitas();
        $idKaryawan = Yii::$app->request->get('id_karyawan');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($idKaryawan !== null) {
                return $this->redirect(['karyawan/view', 'id' => $idKaryawan, '#' => 'w1-dd2-tab3']);
            } else {
                return $this->redirect(['view', 'id' => $model->id_identitas]);
            }
        } else {
            if (Yii::$app->request->isAjax === true) {
                return $this->renderAjax('create_ajax', [
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
     * Updates an existing KaryawanIdentitas model.
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
                return $this->redirect(['karyawan/view', 'id' => $idKaryawan, '#' => 'w1-dd2-tab3']);
            } else {
                return $this->redirect(['view', 'id' => $model->id_identitas]);
            }
        } else {
            if (Yii::$app->request->isAjax === true) {
                return $this->renderAjax('update_ajax', [
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
     * Deletes an existing KaryawanIdentitas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $idKaryawan = Yii::$app->request->get('id_karyawan');
        $this->findModel($id)->delete();
        if ($idKaryawan !== null) {
            return $this->redirect(['karyawan/view', 'id' => $idKaryawan, '#' => 'w1-dd2-tab3']);
        } else {
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the KaryawanIdentitas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KaryawanIdentitas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KaryawanIdentitas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
