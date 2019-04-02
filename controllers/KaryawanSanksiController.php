<?php

namespace app\controllers;

use Yii;
use app\models\KaryawanSanksi;
use app\models\KaryawanSanksiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KaryawanSanksiController implements the CRUD actions for KaryawanSanksi model.
 */
class KaryawanSanksiController extends Controller
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
     * Lists all KaryawanSanksi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KaryawanSanksiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single KaryawanSanksi model.
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
     * Creates a new KaryawanSanksi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new KaryawanSanksi();
        $idKaryawan = Yii::$app->request->get('id_karyawan');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($idKaryawan !== null) {
                return $this->redirect(['karyawan/view', 'id' => $idKaryawan, '#' => 'w1-dd2-tab8']);
            } else {
                return $this->redirect(['view', 'id' => $model->id_sanksi]);
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
     * Updates an existing KaryawanSanksi model.
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
                return $this->redirect(['karyawan/view', 'id' => $idKaryawan, '#' => 'w1-dd2-tab8']);
            } else {
                return $this->redirect(['view', 'id' => $model->id_sanksi]);
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
     * Deletes an existing KaryawanSanksi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $idKaryawan = Yii::$app->request->get('id_karyawan');
        $this->findModel($id)->delete();
        if ($idKaryawan !== null) {
            return $this->redirect(['karyawan/view', 'id' => $idKaryawan, '#' => 'w1-dd2-tab8']);
        } else {
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the KaryawanSanksi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KaryawanSanksi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KaryawanSanksi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
