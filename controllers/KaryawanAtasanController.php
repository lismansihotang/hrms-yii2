<?php
namespace app\controllers;

use Yii;
use app\models\KaryawanAtasan;
use app\models\KaryawanAtasanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KaryawanAtasanController implements the CRUD actions for KaryawanAtasan model.
 */
class KaryawanAtasanController extends Controller
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
     * Lists all KaryawanAtasan models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KaryawanAtasanSearch();
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
     * Displays a single KaryawanAtasan model.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render(
            'view',
            [
                'model' => $this->findModel($id),
            ]
        );
    }

    /**
     * Creates a new KaryawanAtasan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $idKaryawan = Yii::$app->request->get('id_karyawan');
        $model = new KaryawanAtasan();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($idKaryawan !== null) {
                return $this->redirect(['karyawan/view', 'id' => $idKaryawan, '#' => 'w1-dd2-tab1']);
            } else {
                return $this->redirect(['view', 'id' => $model->id_atasan]);
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
     * Updates an existing KaryawanAtasan model.
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
                return $this->redirect(['karyawan/view', 'id' => $idKaryawan, '#' => 'w1-dd2-tab1']);
            } else {
                return $this->redirect(['view', 'id' => $model->id_atasan]);
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
     * Deletes an existing KaryawanAtasan model.
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
            return $this->redirect(['karyawan/view', 'id' => $idKaryawan, '#' => 'w1-dd2-tab1']);
        } else {
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the KaryawanAtasan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return KaryawanAtasan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KaryawanAtasan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
