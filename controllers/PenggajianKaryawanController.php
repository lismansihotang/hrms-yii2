<?php
namespace app\controllers;

use Yii;
use app\models\PenggajianKaryawan;
use app\models\PenggajianKaryawanSearch;
use app\models\Penggajian;
use app\models\PenggajianKaryawanDetail;
use app\models\KomponenGaji;
use app\models\Karyawan;
use app\models\KomponenGajiKaryawan;
use app\models\VKomponenGaji;
use app\models\PenggajianKomponen;
use app\models\Absensi;
use app\models\AbsensiSummary;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;

/**
 * PenggajianKaryawanController implements the CRUD actions for PenggajianKaryawan model.
 */
class PenggajianKaryawanController extends Controller
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
     * Lists all PenggajianKaryawan models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PenggajianKaryawanSearch();
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
     * Displays a single PenggajianKaryawan model.
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
     * Creates a new PenggajianKaryawan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PenggajianKaryawan();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_pk]);
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
     * @param $idPenggajian
     * @param $idKaryawan
     *
     * @return bool
     */
    public function actionUpdateThp($idPenggajian, $idKaryawan)
    {
        $result = false;
        $model = new PenggajianKaryawan();
        $record = $model->findOne(['id_penggajian' => $idPenggajian, 'id_karyawan' => $idKaryawan]);
        if (count($record) > 0) {
            $pendapatan = 0;
            $potongan = 0;
            $modelDetail = new PenggajianKaryawanDetail();
            $recordDetail = $modelDetail->findAll(['id_pk' => $record->id_pk]);
            if (count($recordDetail) > 0) {
                $modelKomponen = new KomponenGaji();
                foreach ($recordDetail as $row) {
                    $recordKomponen = $modelKomponen->find()->select(['kategori_komponen'])->where(
                        ['id_komponen' => $row->id_komponen]
                    )->one();
                    if (count($recordKomponen) > 0) {
                        if ($recordKomponen->kategori_komponen === 'Potongan') {
                            $potongan += $row->subtotal;
                        } else {
                            $pendapatan += $row->subtotal;
                        }
                    }
                }
                $record->potongan = $potongan;
                $record->pendapatan = $pendapatan;
                $record->subtotal = $pendapatan - $potongan;
                $record->thp = $record->subtotal;
                if ((bool)$record->save(false) === true) {
                    $result = true;
                }
            }
        }
        return $result;
    }

    /**
     * @param $id
     *
     * @throws \Exception
     */
    public function actionResetAllData($id)
    {
        $logMsg = '';
        $modelPenggajianKaryawan = new PenggajianKaryawan();
        $data = $modelPenggajianKaryawan->find()->select(['id_pk'])->where(['id_penggajian' => $id])->all();
        $record = $data;
        $i = 0;
        $x = 0;
        if (count($record) > 0) {
            foreach ($record as $row) {
                $modelDetail = new PenggajianKaryawanDetail();
                $recordDetail = $modelDetail::findOne(['id_pk' => $row['id_pk']]);
                if (count($recordDetail) > 0 or $recordDetail !== null) {
                    if ((bool)$recordDetail->delete() !== false) {
                        $i++;
                    } else {
                        $x++;
                    }
                }
                if ((bool)$this->findModel($row['id_pk'])->delete() !== false) {
                    $logMsg = 'Berhasil menghapus data. Succes Menghapus Detail Proses ' . $i . '(s) rows dan Fail ' . $x . '(s) rows';
                } else {
                    $logMsg = 'Gagal menghapus data. Succes Menghapus Detail Proses ' . $i . '(s) rows dan Fail ' . $x . '(s) rows';
                }
            }
        } else {
            $logMsg = 'Belum melakukan Proses Create Data';
        }
        Yii::$app->session->setFlash('msg-payroll', $logMsg);
        $this->redirect(Url::toRoute(['penggajian/view', 'id' => $id]));
    }

    /**
     * @param $tipeKomponen
     * @param $idPenggajian
     * @param $idKaryawan
     *
     * @return int
     */
    protected function actionGetJmlAbsensi($tipeKomponen, $idPenggajian, $idKaryawan)
    {
        $jml = 1;
        if ($tipeKomponen === 'Harian') {
            $jml = 0;
            $modelAbsensiSummary = new AbsensiSummary();
            $recordAbsensiSummary = $modelAbsensiSummary->find()->select(['hadir'])->where(
                ['id_Penggajian' => $idPenggajian, 'id_karyawan' => $idKaryawan]
            )->one();
            if (count($recordAbsensiSummary) > 0) {
                $jml = (integer)$recordAbsensiSummary['hadir'];
            }
        }
        return $jml;
    }

    /**
     * @param $id
     */
    public function actionCreateAllData($id)
    {
        $logMsg = '';

        $modelPenggajianKomponen = new PenggajianKomponen();
        $countPenggajianKomponen = $modelPenggajianKomponen->find()->where(['id_penggajian' => $id])->count();
        if ((integer)$countPenggajianKomponen === 0) {
            Yii::$app->session->setFlash('warning-payroll', 'Silahkan Proses Komponen Penggajian terlebih dahulu...');
            $this->redirect(Url::toRoute(['penggajian/view', 'id' => $id]));
        } else {
            $arrPenggajianKomponen = '';
            $recordPenggajianKomponen = $modelPenggajianKomponen->find()->where(['id_penggajian' => $id])->all();
            foreach ($recordPenggajianKomponen as $komponenGaji) {
                if ($arrPenggajianKomponen !== '') {
                    $arrPenggajianKomponen .= ', "' . $komponenGaji['id_komponen'] . '"';
                } else {
                    $arrPenggajianKomponen = '"' . $komponenGaji['id_komponen'] . '"';
                }
            }
            $modelPenggajian = new Penggajian();
            $recordPenggajian = $modelPenggajian->findOne(['id' => $id]);
            $arrResult = [];
            if (count($recordPenggajian) > 0) {
                #Employee on this company
                $modelKaryawan = new Karyawan();
                $recordKaryawan = $modelKaryawan->find()->select('id_karyawan')->where(
                    ['id_perusahaan' => $recordPenggajian->id_perusahaan]
                )->all();
                $i = 0;
                $x = 0;
                if (count($recordKaryawan) > 0) {
                    foreach ($recordKaryawan as $row) {
                        #Insert header payroll
                        $model = new PenggajianKaryawan();
                        $record = $model->findOne(['id_penggajian' => $id, 'id_karyawan' => $row->id_karyawan]);
                        $fingerId = 0;
                        $modelFinger = (new \yii\db\Query())->select('log_finger_id')->from('karyawan_finger_id')->where(['id_karyawan' => $row->id_karyawan])->one();
                        if (count($modelFinger) > 0) {
                            $fingerId = $modelFinger['log_finger_id'];
                        }

                        if (count($record) > 0) {
                            $record->id_penggajian = $id;
                            $record->id_karyawan = $row->id_karyawan;
                            $record->save(false);
                            $idPk = $record->id_pk;
                        } else {
                            $model->id_penggajian = $id;
                            $model->id_karyawan = $row->id_karyawan;
                            $model->save(false);
                            $idPk = $model->id_pk;
                        }
                        #insert detail payroll
                        $modelKomponen = new KomponenGajiKaryawan();
                        $recordKomponen = $modelKomponen->find()->select(['id_komponen', 'nominal'])->where(
                            ['id_karyawan' => $row->id_karyawan]
                        )->andWhere('id_komponen IN (' . $arrPenggajianKomponen . ')')->all();
                        if (count($recordKomponen) > 0) {
                            foreach ($recordKomponen as $komponen) {
                                $modelMasterKomponen = new KomponenGaji();
                                $recordMasterKomponen = $modelMasterKomponen->find()->select(['tipe'])->where(
                                    ['id_komponen' => $komponen->id_komponen]
                                )->one();
                                $modelDetail = new PenggajianKaryawanDetail();
                                $recordPenggajianDetail = $modelDetail->findOne(
                                    ['id_pk' => $idPk, 'id_komponen' => $komponen->id_komponen]
                                );
                                # Check Absensi
                                $getJmlAbsen = $this->hitungLembur($row->id_karyawan, $fingerId, $recordPenggajian->tgl_awal, $recordPenggajian->tgl_akhir);
                                $jml = 1;
                                if ($recordMasterKomponen['tipe'] === 'Harian') {
                                    if (count($getJmlAbsen) > 0) {
                                        $jml = $getJmlAbsen['totalHari'];
                                    }
                                }
                                /** $jml = $this->actionGetJmlAbsensi(
                                 * $recordMasterKomponen['tipe'],
                                 * $id,
                                 * $row->id_karyawan
                                 * );**/
                                if (count($recordPenggajianDetail) > 0) {
                                    $recordPenggajianDetail->id_pk = $idPk;
                                    $recordPenggajianDetail->id_komponen = $komponen->id_komponen;
                                    $recordPenggajianDetail->jumlah = $jml;
                                    $recordPenggajianDetail->nominal = $komponen->nominal;
                                    $recordPenggajianDetail->subtotal = $recordPenggajianDetail->jumlah * $recordPenggajianDetail->nominal;
                                    if ($recordPenggajianDetail->save(false)) {
                                        $i++;
                                    } else {
                                        $x++;
                                    }
                                } else {
                                    $modelDetail->id_pk = $idPk;
                                    $modelDetail->id_komponen = $komponen->id_komponen;
                                    $modelDetail->jumlah = $jml;
                                    $modelDetail->nominal = $komponen->nominal;
                                    $modelDetail->subtotal = $modelDetail->jumlah * $modelDetail->nominal;
                                    if ($modelDetail->save(false)) {
                                        $i++;
                                    } else {
                                        $x++;
                                    }
                                }
                            }
                        }
                        $updateData = $this->actionUpdateThp($id, $row->id_karyawan);
                        $arrResult[] = ['id_karyawan' => $row->id_karyawan, 'update' => $updateData];
                    }
                    $logMsg = 'Success Proses Penggajian ' . $i . '(s) rows dan Fail ' . $x . '(s) rows';
                }
            }
            Yii::$app->session->setFlash(
                'msg-payroll',
                $logMsg
            );
            $this->redirect(Url::toRoute(['penggajian/view', 'id' => $id]));
        }
    }

    /**
     * @param $getIdKaryawan
     * @param $getFingerId
     * @param $getTglAwal
     * @param $getTglAkhir
     * @return array
     */
    protected function hitungLembur($getIdKaryawan, $getFingerId, $getTglAwal, $getTglAkhir)
    {
        # Variable awal
        $arrAbsensi = [];
        $arrTgl = [];
        $idKaryawan = $getIdKaryawan;
        $fingerId = $getFingerId;
        $timezone = new \DateTimeZone('Asia/Jakarta');
        $totalHari = 0;
        $totalJam9 = 0;
        $totalJam10 = 0;
        $totalJam8Libur = 0;
        $totalJam9Libur = 0;
        $totalJam10Libur = 0;
        # Interval Periode
        $interval = new \DateInterval('P1D');
        $arrTglAkhir = new \DateTime($getTglAkhir);
        $arrTglAkhir->add($interval);
        $periodeTgl = new \DatePeriod(new \DateTime($getTglAwal), $interval, $arrTglAkhir);
        foreach ($periodeTgl as $date) {
            $arrTgl[] = $date->format('Y-m-d');
        }

        if (count($arrTgl) > 0) {
            foreach (array_values($arrTgl) as $date) {
                # Absensi Masuk
                $modelAbsensiIn = (new \yii\db\Query())->select(['log_date', 'log_time'])->from('log_absensi')
                    ->where('log_finger_id="' . $fingerId . '" AND log_date="' . $date . '" AND log_type="1"')->one();
                if (count($modelAbsensiIn) > 0 && $modelAbsensiIn !== false) {
                    $arrAbsensi[$date] = ['in' => $modelAbsensiIn['log_time']];
                } else {
                    $arrAbsensi[$date] = '00:00:00';
                }
                # Asensi Keluar
                $modelAbsensiOut = (new \yii\db\Query())->select(['log_date', 'log_time'])->from('log_absensi')
                    ->where('log_finger_id="' . $fingerId . '" AND log_date="' . $date . '" AND log_type="2"')->one();
                if (count($modelAbsensiOut) > 0 && $modelAbsensiOut !== false) {
                    $arrAbsensi[$date] = array_merge($arrAbsensi[$date], ['out' => $modelAbsensiOut['log_time']]);
                } else {
                    if (is_array($arrAbsensi[$date]) === true) {
                        $arrAbsensi[$date] = array_merge($arrAbsensi[$date], ['out' => '00:00:00']);
                    } else {
                        $arrAbsensi[$date] = ['in' => '00:00:00', 'out' => '00:00:00'];
                    }
                }
            }
        }

        if (count($arrAbsensi) > 0) {
            foreach ($arrAbsensi as $date => $arrValue) {
                # set variable
                $selisih = 0;
                $jam9 = 0;
                $jam10 = 0;
                $jam8Libur = 0;
                $jam9Libur = 0;
                $jam10Libur = 0;
                # echo $date . '(' . $arrValue['in'] . '=' . $arrValue['out'] . ')' . ' = ';
                # cek perbedaan Jam
                $arrTimeOut = explode(':', $arrValue['out']);
                # cek tanggal
                $dateCreatedIn = new \DateTime($date . ' ' . $arrValue['in'], $timezone);

                if (count($arrValue['out']) > 0) {
                    if ($arrTimeOut[0] = '00') {
                        $dateOut = new \DateTime($date . ' ' . $arrValue['out'], $timezone);
                        $dateCreatedOut = $dateOut->add(new \DateInterval('P1D'));
                    } else {
                        $dateCreatedOut = new \DateTime($date . ' ' . $arrValue['out'], $timezone);
                    }
                }

                $timeCompare = $dateCreatedIn->diff($dateCreatedOut);
                $hour = (int)$timeCompare->format('%h');
                if ($hour > 0) {
                    $hour -= 1;
                    $totalHari++;
                }
                # cek libur
                $modelLibur = (new \yii\db\Query())->select('id_karyawan_absensi')->from('karyawan_absensi')
                    ->where(['id_karyawan' => $idKaryawan, 'tgl_absensi' => $date])->one();
                if (count($modelLibur) > 0 && $modelLibur !== false) {
                    $jam8Libur = $hour;
                }
                # $minute = (int)$timeCompare->format('%i');
                # cek selisih
                if ($hour > 0) {
                    $selisih = $hour - 8;
                }

                if ($selisih > 0) {
                    if ($selisih === 1) {
                        $jam9 = 1;
                    } else {
                        $jam9 = 1;
                        $jam10 = $selisih - 1;
                    }
                }
                $totalJam9 += $jam9;
                $totalJam10 += $jam10;
                $totalJam8Libur += $jam8Libur;
                $totalJam9Libur += $jam9Libur;
                $totalJam10Libur += $jam10Libur;
                #echo $hour;
                #echo $date.' ';
                #echo $selisih . ' = ' . $jam9 . ' = ' . $jam10;
                #echo '<br/>';

            }
        }
        # echo 'Total hari : ' . $totalHari;
        #echo 'Total 9 : ' . $totalJam9 . '  Total 10 : ' . $totalJam10 . ' Total 8 Libur : ' . $totalJam8Libur;
        #var_dump($arrAbsensi);
        $result = [
            'totalHari' => $totalHari,
            'jam9' => $totalJam9,
            'jam10' => $totalJam10,
            'jam8Libur' => $totalJam8Libur,
            'jam9Libur' => $totalJam9Libur,
            'jam10Libur' => $totalJam10Libur
        ];

        return $result;
    }

    /**
     * Updates an existing PenggajianKaryawan model.
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
            return $this->redirect(['view', 'id' => $model->id_pk]);
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
     * Deletes an existing PenggajianKaryawan model.
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
     * @param $idGaji
     *
     * @return string
     */
    public function actionCreateDataAjax($id, $idGaji)
    {
        if (Yii::$app->request->isAjax === true) {
            $model = new VKomponenGaji();
            $record = $model->findAll(['id_karyawan' => $id]);
            return $this->renderAjax(
                '_form_ajax',
                [
                    'model' => $record,
                    'idKaryawan' => $id,
                    'idGaji' => $idGaji
                ]
            );
        }
    }

    /**
     * @param $id
     * @param $idGaji
     *
     * @return \yii\web\Response
     */
    public function actionProsesCreateData($id, $idGaji)
    {
        $model = new PenggajianKaryawan();
        $record = $model->find()->select(['id_pk'])->where(['id_karyawan' => $id, 'id_penggajian' => $idGaji])->one();
        $post = Yii::$app->request->post();
        $arrResult = [];
        if (count($record) > 0) {
            $modelPenggajianDetail = new PenggajianKaryawanDetail();
            $deleteRecordPenggajianDetail = $modelPenggajianDetail->deleteAll(['id_pk' => $record->id_pk]);
            if ($deleteRecordPenggajianDetail !== false) {
                if (count($post) > 0) {
                    if (array_key_exists('jumlah', $post) === true) {
                        for ($i = 0; $i < count($post['jumlah']); $i++) {
                            $modelPenggajianDetail = new PenggajianKaryawanDetail();
                            $modelPenggajianDetail->id_pk = $record->id_pk;
                            $modelPenggajianDetail->id_komponen = $post['id_komponen'][$i];
                            $modelPenggajianDetail->jumlah = $post['jumlah'][$i];
                            $modelPenggajianDetail->nominal = $post['nominal'][$i];
                            $modelPenggajianDetail->subtotal = $modelPenggajianDetail->jumlah * $modelPenggajianDetail->nominal;
                            if ($modelPenggajianDetail->save(false) !== false) {
                                $msg = 'Success';
                            } else {
                                $msg = 'Fail';
                            }
                            $updateData = $this->actionUpdateThp($idGaji, $id);
                            $arrResult[] = [
                                'id_komponen' => $post['id_komponen'][$i],
                                'msg' => $msg,
                                'update' => $updateData
                            ];
                        }
                    } else {
                        $arrResult[] = [
                            'id_komponen' => '',
                            'msg' => 'Fail to listed komponen gaji',
                            'update' => ''
                        ];
                    }
                }
            } else {
                $arrResult[] = [
                    'id_komponen' => '',
                    'msg' => 'Fail to Delete old data',
                    'update' => ''
                ];
            }
        } else {
            $arrResult[] = [
                'id_komponen' => '',
                'msg' => 'Fail find detail data',
                'update' => ''
            ];
        }
        Yii::$app->session->setFlash('msg-payroll', $arrResult);
        return $this->redirect(['penggajian/view', 'id' => $idGaji]);
    }

    /**
     * @param $id
     *
     * @return \yii\web\Response
     */
    public function actionCreateAbsensiData($id)
    {
        $modelPenggajian = new Penggajian();
        $record = $modelPenggajian->find()
            ->select(['id_perusahaan', 'tgl', 'bulan', 'tahun', 'tgl_awal', 'tgl_akhir'])
            ->where(['id' => $id])
            ->one();
        # List Karyawan
        $modelKaryawan = new Karyawan();
        $recordKaryawan = $modelKaryawan->find()->select('id_karyawan')->where(
            ['id_perusahaan' => $record['id_perusahaan']]
        )->all();
        if (count($recordKaryawan) > 0) {
            $modelAbsensiSummary = new AbsensiSummary();
            $modelAbsensiSummary->deleteAll(['id_penggajian' => $id]);
            $i = 0;
            $x = 0;
            foreach ($recordKaryawan as $rowKaryawan) {
                # List Finger ID Karyawan
                $countLogAbsensi = 0;
                $modelKaryawanFinger = new \app\models\KaryawanFingerId();
                $recordKaryawanFinger = $modelKaryawanFinger->find()->select('log_finger_id')->where(
                    ['id_karyawan' => $rowKaryawan['id_karyawan']]
                )->one();
                if (count($recordKaryawanFinger) > 0) {
                    $modelLogAbsensi = new \app\models\LogAbsensi();
                    $countLogAbsensi = $modelLogAbsensi->find()
                        ->where(
                            [
                                'log_finger_id' => $recordKaryawanFinger['log_finger_id']
                            ]
                        )
                        ->andWhere(
                            'log_date BETWEEN "' . $record['tgl_awal'] . '" AND "' . $record['tgl_akhir'] . '" '
                        )
                        ->groupBy('log_date')->count();
                }
                $modelAbsensiSummary = new AbsensiSummary();
                $modelAbsensiSummary->id_penggajian = $id;
                $modelAbsensiSummary->id_karyawan = $rowKaryawan['id_karyawan'];
                $modelAbsensiSummary->tgl = $record['tgl'];
                $modelAbsensiSummary->bulan = $record['bulan'];
                $modelAbsensiSummary->tahun = $record['tahun'];
                $modelAbsensiSummary->hadir = $countLogAbsensi;
                if ($modelAbsensiSummary->save(false)) {
                    $i++;
                } else {
                    $x++;
                }
            }
            $logMsg = 'Succes Proses Data ' . $i . '(s) rows dan Fail Proses Data ' . $x . '(s) rows';
        } else {
            $logMsg = 'Tidak di temukan ada karyawan';
        }
        #$arrResult = [];
        Yii::$app->session->setFlash('msg-payroll', $logMsg);
        return $this->redirect(['penggajian/view', 'id' => $id]);
    }

    /**
     * Finds the PenggajianKaryawan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return PenggajianKaryawan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PenggajianKaryawan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
