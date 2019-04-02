<?php

namespace app\controllers;

use Yii;
use app\models\LogAbsensi;
use app\models\LogAbsensiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LogAbsensiController implements the CRUD actions for LogAbsensi model.
 */
class LogAbsensiController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
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
     * Lists all LogAbsensi models.
     *
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new LogAbsensiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render(
                        'index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                        ]
        );
    }

    /**
     * Displays a single LogAbsensi model.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionView($id) {
        return $this->render(
                        'view', [
                    'model' => $this->findModel($id),
                        ]
        );
    }

    /**
     * Creates a new LogAbsensi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate() {
        $model = new LogAbsensi();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $karyawan = (new \yii\db\Query())->select(['karyawan_finger_id.log_finger_id', 'informasi_pribadi.nama'])->from('karyawan')
                            ->innerJoin('karyawan_finger_id', 'karyawan.id_karyawan=karyawan_finger_id.id_karyawan')
                            ->innerJoin('informasi_pribadi', 'karyawan.id_karyawan=informasi_pribadi.id_karyawan')->orderBy('informasi_pribadi.nama')->all();
            return $this->render(
                            'create', [
                        'model' => $model,
                        'karyawan' => $karyawan
                            ]
            );
        }
    }

    /**
     * Updates an existing LogAbsensi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $karyawan = (new \yii\db\Query())->select(['karyawan_finger_id.log_finger_id', 'informasi_pribadi.nama'])->from('karyawan')
                            ->innerJoin('karyawan_finger_id', 'karyawan.id_karyawan=karyawan_finger_id.id_karyawan')
                            ->innerJoin('informasi_pribadi', 'karyawan.id_karyawan=informasi_pribadi.id_karyawan')->orderBy('informasi_pribadi.nama')->all();
            return $this->render(
                            'update', [
                        'model' => $model,
                        'karyawan' => $karyawan
                            ]
            );
        }
    }

    /**
     * Deletes an existing LogAbsensi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * @param $id
     * @param $id_karyawan
     *
     * @return string
     */
    public function actionViewRincian($id, $id_karyawan) {
        $modelPenggajian = new \app\models\Penggajian();
        $recordPenggajian = $modelPenggajian->find()
                ->select(
                        ['id_perusahaan', 'tgl', 'bulan', 'tahun', 'tgl_awal', 'tgl_akhir']
                )
                ->where(['id' => $id])
                ->one();
        $arrLogAbsensi = [];
        if (count($recordPenggajian) > 0) {
            $timeZone = new \DateTimeZone('Asia/Jakarta');
            $beginDate = new \DateTime($recordPenggajian['tgl_awal'], $timeZone);
            $endDate = new \DateTime($recordPenggajian['tgl_akhir'], $timeZone);
            $endDate = $endDate->modify('+1 day');
            $arrObjDate = new \DatePeriod($beginDate, new \DateInterval('P1D'), $endDate);
            foreach ($arrObjDate as $date) {
                $arrDate[$date->format('Y-m-d')] = ['in' => '', 'out' => ''];
            }
            $modelKaryawanFinger = new \app\models\KaryawanFingerId();
            $recordKaryawanFinger = $modelKaryawanFinger->find()->select('log_finger_id')->where(
                            ['id_karyawan' => $id_karyawan]
                    )->one();
            if (count($recordKaryawanFinger) > 0) {
                $modelLogAbsensi = new \app\models\LogAbsensi();
                $rowLogAbsensi = $modelLogAbsensi->find()->select(['log_date', 'log_time'])
                                ->where(
                                        [
                                            'log_finger_id' => $recordKaryawanFinger['log_finger_id']
                                        ]
                                )
                                ->andWhere(
                                        'log_date BETWEEN "' . $recordPenggajian['tgl_awal'] . '" AND "' . $recordPenggajian['tgl_akhir'] . '" '
                                )
                                ->orderBy('log_date, log_time')->all();
                if (count($rowLogAbsensi) > 0) {
                    foreach ($rowLogAbsensi as $row) {
                        if (array_key_exists($row['log_date'], $arrLogAbsensi) === false) {
                            $arrLogAbsensi[$row['log_date']] = ['in' => $row['log_time']];
                        } else {
                            $arrLogAbsensi[$row['log_date']] = array_merge(
                                    $arrLogAbsensi[$row['log_date']], ['out' => $row['log_time']]
                            );
                        }
                    }
                }
                $arrLogAbsensi = array_merge($arrDate, $arrLogAbsensi);
            } else {
                $arrLogAbsensi = $arrDate;
            }
        }
        return $this->renderPartial('view-absensi', ['model' => $arrLogAbsensi]);
    }

    /**
     * @param $month
     * @return string
     */
    protected function bulan($month) {
        $bln = '01';
        $arrBulan = [
            'jan' => '01',
            'feb' => '02',
            'mar' => '03',
            'apr' => '04',
            'may' => '05',
            'jun' => '06',
            'jul' => '07',
            'aug' => '08',
            'sep' => '09',
            'oct' => '10',
            'nov' => '11',
            'dec' => '12'
        ];
        if (array_key_exists(strtolower($month), $arrBulan) === true) {
            $bln = $arrBulan[strtolower($month)];
        }

        return $bln;
    }

    /**
     * @return string
     */
    public function actionImportAbsensi() {
        $model = new LogAbsensi();
        if ($model->load(Yii::$app->request->post())) {
            #var_dump($file = \yii\web\UploadedFile::getInstance($model, 'fileXls'));
            #exit;
            if ($file = \yii\web\UploadedFile::getInstance($model, 'fileXls') !== null) {
                Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/upload/xls/';
                Yii::$app->params['uploadUrl'] = Yii::$app->urlManager->baseUrl . '/web/upload/xls/';

                $file = \yii\web\UploadedFile::getInstance($model, 'fileXls');
                $path = Yii::$app->params['uploadPath'];
                $fileName = Yii::$app->security->generateRandomString() . '.' . $file->extension;
                $file->saveAs($path . $fileName);
                $data = \moonland\phpexcel\Excel::import($path . $fileName);
                #var_dump($data);
                $arrDataAbsensi = [];
                if (count($data) > 0) {
                    foreach (array_values($data) as $row) {
                        if (array_key_exists('AC-No.', $row) === true) {
                            $arrDate = explode('-', $row['Date']);
                            $date = '20' . $arrDate[2] . '-' . $this->bulan($arrDate[1]) . '-' . $arrDate[0];
                            $timeIn = '00:00:00';
                            if ($row['Clock In'] !== '') {
                                $timeIn = $row['Clock In'];
                            }
                            $timeOut = '00:00:00';
                            if ($row['Clock Out'] !== '') {
                                $timeOut = $row['Clock Out'];
                            }
                            $arrDataAbsensi[$row['AC-No.']][] = ['finger_id' => $row['AC-No.'], 'tgl' => $date, 'in' => $timeIn, 'out' => $timeOut];
                        }
                    }
                }
                if (count($arrDataAbsensi) > 0 && $arrDataAbsensi !== false) {
                    $countSuccess = 0;
                    $countFail = 0;

                    foreach (array_values($arrDataAbsensi) as $arrData) {
                        foreach ($arrData as $insertData) {
                            if (array_key_exists('finger_id', $insertData) === true) {
                                # Clock In / Absen Masuk
                                $modelInsert = new LogAbsensi();
                                $record = $modelInsert->findOne(['log_finger_id' => $insertData['finger_id'], 'log_type' => '1', 'log_date' => $insertData['tgl']]);
                                if (count($record) > 0 && $record !== false) {
                                    $record->log_time = $insertData['in'];
                                    if ($record->save(false) !== false) {
                                        $countSuccess++;
                                    } else {
                                        $countFail++;
                                    }
                                } else {
                                    $modelInsert->log_finger_id = $insertData['finger_id'];
                                    $modelInsert->log_fulldate = $insertData['tgl'] . ' ' . $insertData['in'];
                                    $modelInsert->log_type = '1';
                                    $modelInsert->log_date = $insertData['tgl'];
                                    $modelInsert->log_time = $insertData['in'];
                                    if ($modelInsert->save(false) !== false) {
                                        $countSuccess++;
                                    } else {
                                        $countFail++;
                                    }
                                }
                                # Clock Out / Absen Keluar
                                $modelInsert = new LogAbsensi();
                                $record = $modelInsert->findOne(['log_finger_id' => $insertData['finger_id'], 'log_type' => '2', 'log_date' => $insertData['tgl']]);
                                if (count($record) > 0 && $record !== false) {
                                    $record->log_time = $insertData['out'];
                                    if ($record->save(false) !== false) {
                                        $countSuccess++;
                                    } else {
                                        $countFail++;
                                    }
                                } else {
                                    $modelInsert->log_finger_id = $insertData['finger_id'];
                                    $modelInsert->log_fulldate = $insertData['tgl'] . ' ' . $insertData['out'];
                                    $modelInsert->log_type = '2';
                                    $modelInsert->log_date = $insertData['tgl'];
                                    $modelInsert->log_time = $insertData['out'];
                                    if ($modelInsert->save(false) !== false) {
                                        $countSuccess++;
                                    } else {
                                        $countFail++;
                                    }
                                }
                            }
                        }
                    }

                    $msg = 'Proses Import Data Absensi Berhasil. (sebanyak : ' . $countSuccess . ' (s) data berhasil di import, dan sebanyak : ' . $countFail . ' (s) data gagal di import';
                    Yii::$app->session->setFlash('msg-payroll', $msg);
                } else {
                    $msg = 'Proses Import Data Absensi Gagal';
                    Yii::$app->session->setFlash('warning-payroll', $msg);
                }
            } else {
                $msg = 'Silahkan pilih file terlebih dahulu';
                Yii::$app->session->setFlash('warning-payroll', $msg);
            }
        }
        return $this->render('import_absensi', ['model' => $model]);
    }

    /**
     * Finds the LogAbsensi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return LogAbsensi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = LogAbsensi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
