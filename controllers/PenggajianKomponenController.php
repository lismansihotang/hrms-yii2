<?php
namespace app\controllers;

use Yii;
use app\models\PenggajianKomponen;
use app\models\PenggajianKomponenSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PenggajianKomponenController implements the CRUD actions for PenggajianKomponen model.
 */
class PenggajianKomponenController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all PenggajianKomponen models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PenggajianKomponenSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render(
            'index',
            [
                'searchModel'  => $searchModel,
                'dataProvider' => $dataProvider,
            ]
        );
    }

    /**
     * Displays a single PenggajianKomponen model.
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
     * Creates a new PenggajianKomponen model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PenggajianKomponen();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render(
                'create',
                [
                    'model' => $model,
                ]
            );
        }
    }

    /**
     * Updates an existing PenggajianKomponen model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render(
                'update',
                [
                    'model' => $model,
                ]
            );
        }
    }

    /**
     * Deletes an existing PenggajianKomponen model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * @param $id
     *
     * @return string
     */
    public function actionCreateKomponenData($id)
    {
        return $this->render('create-komponen-data', ['id' => $id]);
    }

    /**
     * @param $id
     *
     * @return \yii\web\Response
     */
    public function actionProsesCreateData($id)
    {
        $post = Yii::$app->request->post();
        #var_dump(array_key_exists(1, $post['chk_komponen']));exit;
        if (count($post['chk_komponen']) > 0) {
            $model = new PenggajianKomponen();
            $model->deleteAll(['id_penggajian' => $id]);
            for ($i = 0; $i <= count($post['chk_komponen']); $i++) {
                if (array_key_exists($i, $post['chk_komponen']) === true) {
                    $model = new PenggajianKomponen();
                    $model->id_penggajian = $id;
                    $model->id_komponen = $post['chk_komponen'][$i];
                    $model->save(false);
                }
            }
        }
        return $this->redirect(['penggajian/view', 'id' => $id]);
    }

    /**
     * Finds the PenggajianKomponen model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return PenggajianKomponen the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PenggajianKomponen::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
