<?php

namespace app\controllers;

use Yii;
use app\models\KaryawanFile;
use app\models\KaryawanFileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KaryawanFileController implements the CRUD actions for KaryawanFile model.
 */
class KaryawanFileController extends Controller
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
     * Lists all KaryawanFile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KaryawanFileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single KaryawanFile model.
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
     * Creates a new KaryawanFile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new KaryawanFile();
        $idKaryawan = Yii::$app->request->get('id_karyawan');
        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/upload/';
            Yii::$app->params['uploadUrl'] = Yii::$app->urlManager->baseUrl . '/web/upload/';

            $file = \yii\web\UploadedFile::getInstance($model, 'image');
            $path = Yii::$app->params['uploadPath'];
            $fileName = Yii::$app->security->generateRandomString() . '.' . $file->extension;
            $file->saveAs($path . $fileName);
            $model->nm_file = $fileName;
            $model->save();
            if ($idKaryawan !== null) {
                return $this->redirect(['karyawan/view', 'id' => $idKaryawan, '#' => 'w1-dd1-tab3']);
            } else {
                return $this->redirect(['view', 'id' => $model->id_file]);
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
     * Updates an existing KaryawanFile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_file]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing KaryawanFile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $idKaryawan = Yii::$app->request->get('id_karyawan');
        $this->findModel($id)->delete();
        if ($idKaryawan !== null) {
            return $this->redirect(['karyawan/view', 'id' => $idKaryawan, '#' => 'w1-dd1-tab3']);
        } else {
            return $this->redirect(['index']);
        }
    }

    /**
     * @param $id
     * @param $status
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionChangeStatus($id, $status)
    {
        $idKaryawan = Yii::$app->request->get('id_karyawan');
        $model = $this->findModel($id);
        if ((integer)$status === 1) {
            $model->is_active = 0;
        } else {
            $model->is_active = 1;
            $model->updateAll(['is_active' => '0'], ['id_karyawan' => $idKaryawan, 'is_active' => '1']);
        }
        $model->save(false);

        if ($idKaryawan !== null) {
            return $this->redirect(['karyawan/view', 'id' => $idKaryawan, '#' => 'w1-dd1-tab3']);
        } else {
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the KaryawanFile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KaryawanFile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KaryawanFile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
