<?php
namespace app\controllers;

use Yii;
use app\models\InformasiPribadi;
use app\models\InformasiPribadiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InformasiPribadiController implements the CRUD actions for InformasiPribadi model.
 */
class InformasiPribadiController extends Controller
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
     * Lists all InformasiPribadi models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InformasiPribadiSearch();
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
     * Displays a single InformasiPribadi model.
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
     * Creates a new InformasiPribadi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new InformasiPribadi();
        $idKaryawan = Yii::$app->request->get('id_karyawan');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($idKaryawan !== null) {
                return $this->redirect(['karyawan/view', 'id' => $idKaryawan, '#' => 'w1-dd1-tab0']);
            } else {
                return $this->redirect(['view', 'id' => $model->id_info]);
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
     * Updates an existing InformasiPribadi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $idKaryawan = Yii::$app->request->get('id_karyawan');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($idKaryawan !== null) {
                return $this->redirect(['karyawan/view', 'id' => $idKaryawan, '#' => 'w1-dd1-tab0']);
            } else {
                return $this->redirect(['view', 'id' => $model->id_info]);
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
     * Deletes an existing InformasiPribadi model.
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
            return $this->redirect(['karyawan/view', 'id' => $idKaryawan, '#' => 'w1-dd1-tab0']);
        } else {
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the InformasiPribadi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return InformasiPribadi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InformasiPribadi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
