<?php
namespace app\controllers;

use Yii;
use app\models\KomponenGajiKaryawan;
use app\models\KomponenGajiKaryawanSearch;
use app\models\VKomponenGaji;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KomponenGajiKaryawanController implements the CRUD actions for KomponenGajiKaryawan model.
 */
class KomponenGajiKaryawanController extends Controller
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
     * Lists all KomponenGajiKaryawan models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KomponenGajiKaryawanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render(
            'index',
            [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]
        );
    }

    /**
     * Displays a single KomponenGajiKaryawan model.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionView($id)
    {
        if (Yii::$app->request->isAjax === true) {
            return $this->renderAjax(
                'view',
                [
                    'model' => $this->findModel($id),
                ]
            );
        } else {
            return $this->render(
                'view',
                [
                    'model' => $this->findModel($id),
                ]
            );
        }
    }

    /**
     * @param $id
     *
     * @return string
     */
    public function actionViewAjax($id)
    {
        if (Yii::$app->request->isAjax) {
            $model = new VKomponenGaji();
            $record = $model->findAll(['id_karyawan' => $id]);
            return $this->renderAjax(
                'view-ajax',
                [
                    'model' => $record,
                ]
            );
        } else {
            return false;
        }
    }

    /**
     * Creates a new KomponenGajiKaryawan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $idKaryawan = Yii::$app->request->get('id_karyawan');
        $model = new KomponenGajiKaryawan();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($idKaryawan !== null) {
                return $this->redirect(['karyawan/view', 'id' => $idKaryawan, '#' => 'w1-dd2-tab5']);
            } else {
                return $this->redirect(['view', 'id' => $model->id_kgk]);
            }
        } else {
            if (Yii::$app->request->isAjax === true) {
                return $this->renderAjax(
                    'create_ajax',
                    [
                        'model' => $model,
                        'id_karyawan' => $idKaryawan
                    ]
                );
            } else {
                return $this->render(
                    'create',
                    [
                        'model' => $model,
                        'id_karyawan' => $idKaryawan
                    ]
                );
            }
        }
    }

    /**
     * Updates an existing KomponenGajiKaryawan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $idKaryawan = Yii::$app->request->get('id_karyawan');
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($idKaryawan !== null) {
                return $this->redirect(['karyawan/view', 'id' => $idKaryawan, '#' => 'w1-dd2-tab5']);
            } else {
                return $this->redirect(['view', 'id' => $model->id_kgk]);
            }
        } else {
            if (Yii::$app->request->isAjax === true) {
                return $this->renderAjax(
                    'update_ajax',
                    [
                        'model' => $model,
                        'id_karyawan' => $idKaryawan
                    ]
                );
            } else {
                return $this->render(
                    'update',
                    [
                        'model' => $model,
                        'id_karyawan' => $idKaryawan
                    ]
                );
            }
        }
    }

    /**
     * Deletes an existing KomponenGajiKaryawan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionDelete($id)
    {
        $idKaryawan = Yii::$app->request->get('id_karyawan');
        $this->findModel($id)->delete();
        if ($idKaryawan !== null) {
            return $this->redirect(['karyawan/view', 'id' => $idKaryawan, '#' => 'w1-dd2-tab5']);
        } else {
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the KomponenGajiKaryawan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return KomponenGajiKaryawan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KomponenGajiKaryawan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
