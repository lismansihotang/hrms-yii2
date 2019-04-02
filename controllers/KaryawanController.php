<?php

namespace app\controllers;

use Yii;
use app\models\Karyawan;
use app\models\KaryawanSearch;
use app\models\InformasiPribadi;
use app\models\VKomponenGaji;
use app\models\VKaryawanAtasan;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KaryawanController implements the CRUD actions for Karyawan model.
 */
class KaryawanController extends Controller {

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
     * Lists all Karyawan models.
     *
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new KaryawanSearch();
        /** $params = Yii::$app->request->queryParams;
         * if (isset($params['status']) === true) {
         * $params = $params['status'];
         * } */
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere('karyawan.id_status IN ("2","3","4")');
        return $this->render(
                        'index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                        ]
        );
    }

    /**
     * @param $status
     * @return string
     */
    public function actionListKaryawan($status) {

        $idStatus = 2;
        if ($status === 'non-aktif') {
            $idStatus = '5,6,7';
        } elseif ($status === 'non-karyawan') {
            $idStatus = '8';
        } elseif ($status === 'pkl') {
            $idStatus = '9';
        } elseif ($status === 'magang') {
            $idStatus = '1';
        }
        $model = (new \yii\db\Query())->select([
                            'karyawan.id_karyawan',
                            'karyawan.nik',
                            'karyawan.tgl_bergabung',
                            'informasi_pribadi.nama',
                            'm_status.nm_status',
                            'jabatan.nm_jabatan',
                            'perusahaan.nm_pt'
                        ])->from('karyawan')
                        ->leftJoin('informasi_pribadi', 'karyawan.id_karyawan=informasi_pribadi.id_karyawan')
                        ->leftJoin('m_status', 'karyawan.id_status=m_status.id_status')
                        ->leftJoin('jabatan', 'karyawan.id_jabatan=jabatan.id')
                        ->leftJoin('perusahaan', 'karyawan.id_perusahaan=perusahaan.id')
                        ->where('karyawan.id_status IN (' . $idStatus . ')')->all();

        return $this->render('list', ['model' => $model, 'status' => $status]);
    }

    public function actionViewList($id, $status) {
        $model = $this->findModel($id);
        $where = ['id_karyawan' => $model->id_karyawan];

        $recordInformasiPribadi = (new InformasiPribadi())->findOne($where);
        $recordKomponenGaji = (new VKomponenGaji())->findAll($where);
        $recordKaryawanAtasan = (new VKaryawanAtasan())->findOne($where);
        $recordPendidikan = (new \app\models\VRiwayatPendidikan())->findAll($where);
        $recordDepartemen = (new \app\models\VKaryawanDepartemen())->findAll($where);
        $recordIdentitas = (new \app\models\VKaryawanIdentitas())->findAll($where);
        $recordInventaris = (new \app\models\VKaryawanInventaris())->findAll($where);
        $recordKarir = (new \app\models\VKaryawanKarir())->findAll($where);
        $recordStatus = (new \app\models\VKaryawanStatus())->findAll($where);
        $recordSanksi = (new \app\models\VKaryawanSanksi())->findAll($where);
        $recordRekening = (new \app\models\VKaryawanRekening())->findAll($where);
        $recordFinger = (new \app\models\VKaryawanFinger())->findAll($where);
        $recordKeluarga = (new \app\models\VKaryawanKeluarga())->findAll($where);
        $recordImage = (new \app\models\KaryawanFile())->findAll($where);
        $recordImageActive = (new \app\models\KaryawanFile())->findOne(array_merge($where, ['is_active' => 1]));
        $img = 'noimagefound.jpg';
        if (count($recordImageActive) > 0 and $recordImageActive !== false) {
            $img = $recordImageActive['nm_file'];
        }
        $recordAbsensi = (new \yii\db\Query())->select([
                            'log_absensi.id',
                            'log_absensi.log_type',
                            'log_absensi.log_date',
                            'log_absensi.log_time'
                        ])->from('karyawan_finger_id')
                        ->innerJoin('log_absensi', 'karyawan_finger_id.log_finger_id=log_absensi.log_finger_id')
                        ->where(['karyawan_finger_id.id_karyawan' => $model->id_karyawan])
                        ->limit('31')->orderBy('log_absensi.log_date DESC')->all();
        return $this->render(
                        'view_list', [
                    'model' => $model,
                    'modelInformasiPribadi' => $recordInformasiPribadi,
                    'modelKomponenGaji' => $recordKomponenGaji,
                    'modelKaryawanAtasan' => $recordKaryawanAtasan,
                    'modelPendidikan' => $recordPendidikan,
                    'modelDepartemen' => $recordDepartemen,
                    'modelIdentitas' => $recordIdentitas,
                    'modelInventaris' => $recordInventaris,
                    'modelKarir' => $recordKarir,
                    'modelStatus' => $recordStatus,
                    'modelSanksi' => $recordSanksi,
                    'modelRekening' => $recordRekening,
                    'modelFinger' => $recordFinger,
                    'modelKeluarga' => $recordKeluarga,
                    'modelImage' => $recordImage,
                    'image' => $img,
                    'modelAbsensi' => $recordAbsensi,
                    'status' => $status
                        ]
        );
    }

    /**
     * Displays a single Karyawan model.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionView($id) {
        $model = $this->findModel($id);
        $where = ['id_karyawan' => $model->id_karyawan];

        $recordInformasiPribadi = (new InformasiPribadi())->findOne($where);
        $recordKomponenGaji = (new VKomponenGaji())->findAll($where);
        $recordKaryawanAtasan = (new VKaryawanAtasan())->findOne($where);
        $recordPendidikan = (new \app\models\VRiwayatPendidikan())->findAll($where);
        $recordDepartemen = (new \app\models\VKaryawanDepartemen())->findAll($where);
        $recordIdentitas = (new \app\models\VKaryawanIdentitas())->findAll($where);
        $recordInventaris = (new \app\models\VKaryawanInventaris())->findAll($where);
        $recordKarir = (new \app\models\VKaryawanKarir())->findAll($where);
        $recordStatus = (new \app\models\VKaryawanStatus())->findAll($where);
        $recordSanksi = (new \app\models\VKaryawanSanksi())->findAll($where);
        $recordRekening = (new \app\models\VKaryawanRekening())->findAll($where);
        $recordFinger = (new \app\models\VKaryawanFinger())->findAll($where);
        $recordKeluarga = (new \app\models\VKaryawanKeluarga())->findAll($where);
        $recordImage = (new \app\models\KaryawanFile())->findAll($where);
        $recordImageActive = (new \app\models\KaryawanFile())->findOne(array_merge($where, ['is_active' => 1]));
        $img = 'noimagefound.jpg';
        if (count($recordImageActive) > 0 and $recordImageActive !== false) {
            $img = $recordImageActive['nm_file'];
        }
        $recordAbsensi = (new \yii\db\Query())->select([
                            'log_absensi.id',
                            'log_absensi.log_type',
                            'log_absensi.log_date',
                            'log_absensi.log_time'
                        ])->from('karyawan_finger_id')
                        ->innerJoin('log_absensi', 'karyawan_finger_id.log_finger_id=log_absensi.log_finger_id')
                        ->where(['karyawan_finger_id.id_karyawan' => $model->id_karyawan])
                        ->limit('31')->orderBy('log_absensi.log_date DESC')->all();
        return $this->render(
                        'view', [
                    'model' => $model,
                    'modelInformasiPribadi' => $recordInformasiPribadi,
                    'modelKomponenGaji' => $recordKomponenGaji,
                    'modelKaryawanAtasan' => $recordKaryawanAtasan,
                    'modelPendidikan' => $recordPendidikan,
                    'modelDepartemen' => $recordDepartemen,
                    'modelIdentitas' => $recordIdentitas,
                    'modelInventaris' => $recordInventaris,
                    'modelKarir' => $recordKarir,
                    'modelStatus' => $recordStatus,
                    'modelSanksi' => $recordSanksi,
                    'modelRekening' => $recordRekening,
                    'modelFinger' => $recordFinger,
                    'modelKeluarga' => $recordKeluarga,
                    'modelImage' => $recordImage,
                    'image' => $img,
                    'modelAbsensi' => $recordAbsensi
                        ]
        );
    }

    /**
     * Creates a new Karyawan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate() {
        $model = new Karyawan();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_karyawan]);
        } else {
            return $this->render(
                            'create', [
                        'model' => $model,
                            ]
            );
        }
    }

    /**
     * Updates an existing Karyawan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_karyawan]);
        } else {
            return $this->render(
                            'update', [
                        'model' => $model,
                            ]
            );
        }
    }

    /**
     * Deletes an existing Karyawan model.
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
     * @return string
     */
    public function actionPrintReportAbsensi() {
        $tglAwal = date('Y-m-d');
        $tglAkhir = date('Y-m-d');
        $fingerId = '';
        $idKaryawan = '';
        $nmKaryawan = '';

        if (count(Yii::$app->request->get()) > 0) {
            $tglAwal = Yii::$app->request->get('tgl_awal');
            $tglAkhir = Yii::$app->request->get('tgl_akhir');
            $idKaryawan = Yii::$app->request->get('id_karyawan');
            $modelFinger = (new \app\models\KaryawanFingerId())->find()->select('log_finger_id')->where(['id_karyawan' => $idKaryawan])->one();
            if (count($modelFinger) > 0 && $modelFinger !== false) {
                $fingerId = $modelFinger->log_finger_id;
            }
            $modelKaryawan = (new InformasiPribadi())->find()->select('nama')->where(['id_karyawan' => $idKaryawan])->one();
            if (count($modelKaryawan) > 0 && $modelKaryawan !== false) {
                $nmKaryawan = $modelKaryawan->nama;
            }
        }

        $model = $this->hitungLembur($idKaryawan, $fingerId, $tglAwal, $tglAkhir);

        return $this->renderPartial('_cetak_absensi', ['model' => $model, 'tgl_awal' => $tglAwal, 'tgl_akhir' => $tglAkhir, 'nm_karyawan' => $nmKaryawan]);
    }

    /**
     * @return string
     */
    public function actionExportExcel() {
        $tglAwal = date('Y-m-d');
        $tglAkhir = date('Y-m-d');
        $fingerId = '';
        $idKaryawan = '';
        $nmKaryawan = '';

        if (count(Yii::$app->request->get()) > 0) {
            $tglAwal = Yii::$app->request->get('tgl_awal');
            $tglAkhir = Yii::$app->request->get('tgl_akhir');
            $idKaryawan = Yii::$app->request->get('id_karyawan');
            $modelFinger = (new \app\models\KaryawanFingerId())->find()->select('log_finger_id')->where(['id_karyawan' => $idKaryawan])->one();
            if (count($modelFinger) > 0 && $modelFinger !== false) {
                $fingerId = $modelFinger->log_finger_id;
            }
            $modelKaryawan = (new InformasiPribadi())->find()->select('nama')->where(['id_karyawan' => $idKaryawan])->one();
            if (count($modelKaryawan) > 0 && $modelKaryawan !== false) {
                $nmKaryawan = $modelKaryawan->nama;
            }
        }

        $getArray = $this->hitungLembur($idKaryawan, $fingerId, $tglAwal, $tglAkhir);
        if (count($getArray) > 0) {
            foreach (array_values($getArray) as $arrValue) {
                if (is_array($arrValue) === true) {
                    foreach ($arrValue as $key => $value) {
                        $model[] = array_merge(['tgl' => $key], $value);
                    }
                }
            }
        }
        return $this->render('_export_absensi_excel', ['model' => $model, 'nmKaryawan' => $nmKaryawan]);
    }

    /**
     * @return string
     */
    public function actionReportAbsensi() {
        $tglAwal = date('Y-m-d');
        $tglAkhir = date('Y-m-d');
        $fingerId = '';
        $idKaryawan = '';

        if (count(Yii::$app->request->post()) > 0) {
            $tglAwal = Yii::$app->request->post('tgl_awal');
            $tglAkhir = Yii::$app->request->post('tgl_akhir');
            $idKaryawan = Yii::$app->request->post('id_karyawan');
            $modelFinger = (new \app\models\KaryawanFingerId())->find()->select('log_finger_id')->where(['id_karyawan' => $idKaryawan])->one();
            if (count($modelFinger) > 0 && $modelFinger !== false) {
                $fingerId = $modelFinger->log_finger_id;
            }
        }

        $model = $this->hitungLembur($idKaryawan, $fingerId, $tglAwal, $tglAkhir);

        return $this->render('_absensi', ['model' => $model, 'idKaryawan' => $idKaryawan]);
    }

    /**
     * @param $getIdKaryawan
     * @return array
     */
    protected function getInformasiKaryawan($getIdKaryawan) {
        $idKaryawan = $getIdKaryawan;
        $where = ['id_karyawan' => $idKaryawan];
        $modelKaryawan = (new \yii\db\Query())->select(['karyawan.nik', 'karyawan.tgl_bergabung', 'jabatan.nm_jabatan'])->from('karyawan')
                        ->innerJoin('jabatan', 'karyawan.id_jabatan=jabatan.id')->where($where)->one();
        if (count($modelKaryawan) > 0 && $modelKaryawan !== false) {
            $model = ['nik' => $modelKaryawan['nik'], 'doj' => $modelKaryawan['tgl_bergabung'], 'jabatan' => $modelKaryawan['nm_jabatan']];
        } else {
            $model = ['nik' => '', 'doj' => '', 'jabatan' => ''];
        }
        $modelInformasiPribadi = (new \yii\db\Query())->select(['nama', 'jk'])->from('informasi_pribadi')->where($where)->one();
        if (count($modelInformasiPribadi) > 0 && $modelInformasiPribadi !== false) {
            $model = array_merge($model, ['nama' => $modelInformasiPribadi['nama'], 'jk' => $modelInformasiPribadi['jk']]);
        } else {
            $model = array_merge($model, ['nama' => '', 'jk' => '']);
        }
        $dept = '';
        $modelDept = (new \yii\db\Query())->select(['dept.singkatan', 'dept.nm_dept'])->from('karyawan_dept')
                        ->innerJoin('dept', 'karyawan_dept.id_dept=dept.id_dept')->where($where)->all();
        if (count($modelDept) > 0 && $modelDept !== false) {
            foreach ($modelDept as $rowDept) {
                if ($dept === '') {
                    $dept = $rowDept['singkatan'];
                } else {
                    $dept .= ', ' . $rowDept['singkatan'];
                }
            }
        }
        $model = array_merge($model, ['dept' => $dept]);
        return $model;
    }

    /**
     * @return string
     */
    public function actionReportInformasiKaryawan() {
        $model = [];
        if (count(Yii::$app->request->post()) > 0) {
            $idKaryawan = Yii::$app->request->post('id_karyawan');
            $model[] = $this->getInformasiKaryawan($idKaryawan);
        } else {
            $getKaryawan = (new \yii\db\Query())->select(['id_karyawan'])->from('karyawan')
                            ->where('id_status IN("1","2","3","4","7")')->all();
            if (count($getKaryawan) > 0 && $getKaryawan !== false) {
                $i = 0;
                foreach ($getKaryawan as $row) {
                    $model[$i] = $this->getInformasiKaryawan($row['id_karyawan']);
                    $i++;
                }
            }
            $idKaryawan = '';
        }

        return $this->render('_report_informasi_karyawan', ['model' => $model, 'idKaryawan' => $idKaryawan]);
    }

    /**
     * @return string
     */
    public function actionPrintReportInformasiKaryawan() {
        $model = [];
        if (count(Yii::$app->request->get()) > 0) {
            $idKaryawan = Yii::$app->request->get('id_karyawan');
            if ($idKaryawan !== '') {
                $model[] = $this->getInformasiKaryawan($idKaryawan);
            } else {
                $getKaryawan = (new \yii\db\Query())->select(['id_karyawan'])->from('karyawan')
                                ->where('id_status IN("1","2","3","4","7")')->all();
                if (count($getKaryawan) > 0 && $getKaryawan !== false) {
                    $i = 0;
                    foreach ($getKaryawan as $row) {
                        $model[$i] = $this->getInformasiKaryawan($row['id_karyawan']);
                        $i++;
                    }
                }
            }
        } else {
            $getKaryawan = (new \yii\db\Query())->select(['id_karyawan'])->from('karyawan')
                            ->where('id_status IN("1","2","3","4","7")')->all();
            if (count($getKaryawan) > 0 && $getKaryawan !== false) {
                $i = 0;
                foreach ($getKaryawan as $row) {
                    $model[$i] = $this->getInformasiKaryawan($row['id_karyawan']);
                    $i++;
                }
            }
            $idKaryawan = '';
        }

        return $this->renderPartial('_cetak_informasi_karyawan', ['model' => $model, 'idKaryawan' => $idKaryawan]);
    }

    /**
     * @param $getIdKaryawan
     * @param $thn
     * @return array
     */
    protected function getRekapAbsensi($getIdKaryawan, $thn) {
        $bulan = [
            '1' => 'jan',
            '2' => 'feb',
            '3' => 'mar',
            '4' => 'apr',
            '5' => 'mei',
            '6' => 'jun',
            '7' => 'jul',
            '8' => 'agu',
            '9' => 'sep',
            '10' => 'okt',
            '11' => 'nov',
            '12' => 'des'
        ];
        $nmKaryawan = '';
        $modelNama = (new \yii\db\Query())->select(['nama'])->from('informasi_pribadi')->where(['id_karyawan' => $getIdKaryawan])->one();
        if (count($modelNama) > 0 && $modelNama !== false) {
            $nmKaryawan = $modelNama['nama'];
        }
        foreach ($bulan as $key => $value) {
            $modelAbsensi = (new \yii\db\Query())->select(['COUNT(log_absensi.id) AS total'])
                    ->from('log_absensi')->innerJoin('karyawan_finger_id', 'log_absensi.log_finger_id=karyawan_finger_id.log_finger_id')
                    ->where(
                            'karyawan_finger_id.id_karyawan="' . $getIdKaryawan . '" AND MONTH(log_absensi.log_date)="' . $key . '" AND YEAR(log_absensi.log_date)="' . $thn . '" AND log_absensi.log_type="1" AND log_absensi.log_time<>"00:00:00"')
                    ->all();
            if (count($modelAbsensi) > 0 && $modelAbsensi !== false) {
                foreach ($modelAbsensi as $row) {
                    $arrBulan[$value] = $row['total'];
                }
                $model = array_merge(['nama' => $nmKaryawan, 'thn' => $thn], $arrBulan);
            }
        }
        return $model;
    }

    /**
     * @return string
     */
    public function actionReportRekapAbsensi() {
        $model = [];
        if (count(Yii::$app->request->post()) > 0) {
            $idKaryawan = Yii::$app->request->post('id_karyawan');
            $thn = Yii::$app->request->post('thn');
            if ($idKaryawan !== '') {
                $model[] = $this->getRekapAbsensi($idKaryawan, $thn);
            } else {
                $getKaryawan = (new \yii\db\Query())->select(['id_karyawan'])->from('karyawan')
                                ->where('id_status IN("1","2","3","4","7")')->all();
                if (count($getKaryawan) > 0 && $getKaryawan !== false) {
                    $i = 0;
                    foreach ($getKaryawan as $row) {
                        $model[$i] = $this->getRekapAbsensi($row['id_karyawan'], $thn);
                        $i++;
                    }
                }
                $idKaryawan = '';
            }
        } else {
            $thn = date('Y');
            $getKaryawan = (new \yii\db\Query())->select(['id_karyawan'])->from('karyawan')
                            ->where('id_status IN("1","2","3","4","7")')->all();
            if (count($getKaryawan) > 0 && $getKaryawan !== false) {
                $i = 0;
                foreach ($getKaryawan as $row) {
                    $model[$i] = $this->getRekapAbsensi($row['id_karyawan'], $thn);
                    $i++;
                }
            }
            $idKaryawan = '';
        }


        return $this->render('_report_rekap_absensi', ['model' => $model, 'idKaryawan' => $idKaryawan]);
    }

    /**
     * @return string
     */
    public function actionExportExcelInformasiKaryawan() {
        $model = [];
        if (count(Yii::$app->request->get()) > 0) {
            $idKaryawan = Yii::$app->request->get('id_karyawan');
            if ($idKaryawan !== '') {
                $model[] = $this->getInformasiKaryawan($idKaryawan);
            } else {
                $getKaryawan = (new \yii\db\Query())->select(['id_karyawan'])->from('karyawan')
                                ->where('id_status IN("1","2","3","4","7")')->all();
                if (count($getKaryawan) > 0 && $getKaryawan !== false) {
                    $i = 0;
                    foreach ($getKaryawan as $row) {
                        $model[$i] = $this->getInformasiKaryawan($row['id_karyawan']);
                        $i++;
                    }
                }
            }
        } else {
            $getKaryawan = (new \yii\db\Query())->select(['id_karyawan'])->from('karyawan')
                            ->where('id_status IN("1","2","3","4","7")')->all();
            if (count($getKaryawan) > 0 && $getKaryawan !== false) {
                $i = 0;
                foreach ($getKaryawan as $row) {
                    $model[$i] = $this->getInformasiKaryawan($row['id_karyawan']);
                    $i++;
                }
            }
            $idKaryawan = '';
        }

        return $this->render('_export_informasi_karyawan', ['model' => $model, 'idKaryawan' => $idKaryawan]);
    }

    /**
     * @param $getIdKaryawan
     * @param $getFingerId
     * @param $getTglAwal
     * @param $getTglAkhir
     * @return array
     */
    protected function hitungLembur($getIdKaryawan, $getFingerId, $getTglAwal, $getTglAkhir) {
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

        $arrData = '';
        if (count($arrAbsensi) > 0) {
            foreach ($arrAbsensi as $date => $arrValue) {
                # set variable
                $selisih = 0;
                $jam9 = 0;
                $jam10 = 0;
                $jam8Libur = 0;
                $jam9Libur = 0;
                $jam10Libur = 0;
                $rest = 0;
                $work = 0;
                $total = 0;
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
                $hour = (int) $timeCompare->format('%h');
                if ($hour > 0) {
                    $hour -= 1;
                    $totalHari++;
                    $rest = 1;
                    $work = 8;
                    $total = $hour + 1;
                }
                # cek libur
                $modelLibur = (new \yii\db\Query())->select('id_karyawan_absensi')->from('karyawan_absensi')
                                ->where(['id_karyawan' => $idKaryawan, 'tgl_absensi' => $date])->one();
                if (count($modelLibur) > 0 && $modelLibur !== false) {
                    if ($hour < 8) {
                        $jam8Libur = $hour;
                    } elseif ($hour > 8) {
                        $jam9Libur = 1;
                        if (($hour - 1) >= 10) {
                            $jam10Libur = $hour - 1;
                        }
                    }
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
                $arrData[$date] = [
                    'in' => $arrValue['in'],
                    'out' => $arrValue['out'],
                    'total' => $total,
                    'rest' => $rest,
                    'work' => $work,
                    'm' => $jam9,
                    'n' => $jam10,
                    'o' => $jam8Libur,
                    'p' => $jam9Libur,
                    'q' => $jam10Libur
                ];
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
            'jam10Libur' => $totalJam10Libur,
            'arrAbsensi' => $arrData
        ];

        return $result;
    }

    /**
     * 
     * @param type $idKaryawan
     * @param type $month
     * @param type $thn
     * @return string
     */
    protected function dataRekapAbsensi($idKaryawan, $month, $thn) {
        $arrData = [];
        $jamDatang = '08:00:00';
        $jamPulang = '16:00:00';
        $timezone = new \DateTimeZone('Asia/Jakarta');
        $finger = \app\models\KaryawanFingerId::findOne(['id_karyawan' => $idKaryawan]);
        if (count($finger) > 0 && $finger !== false) {
            #var_dump($thn);
            $modelAbsensi = \app\models\LogAbsensi::find()->where(['log_finger_id' => $finger->log_finger_id, 'YEAR(log_date)' => $thn, 'MONTH(log_date)' => $month])->all();
            #var_dump($modelAbsensi);
            #exit;
            if (count($modelAbsensi) > 0 && $modelAbsensi !== false) {
                $countJamTerlambat = 0;
                $countMenitTerlambat = 0;
                $jmlTerlambat = 0;
                $countJamPulangAwal = 0;
                $countMenitPulangAwal = 0;
                $jmlPulangAwal = 0;
                foreach ($modelAbsensi as $rowAbsensi) {
                    if ((int) $rowAbsensi->log_type === 1) {
                        if ($rowAbsensi->log_time !== '00:00:00') {
                            $jamShiftDatang = new \DateTime($rowAbsensi->log_date . ' ' . $jamDatang, $timezone);
                            $jamAbsensiDatang = new \DateTime($rowAbsensi->log_date . ' ' . $rowAbsensi->log_time, $timezone);
                            $compareDatang = $jamShiftDatang->diff($jamAbsensiDatang);
                            if ($compareDatang->invert !== 1) {
                                $countJamTerlambat += (int) $compareDatang->format('%h');
                                $countMenitTerlambat += (int) $compareDatang->format('%i');
                                $jmlTerlambat += 1;
                            }
                        }
                    } elseif ((int) $rowAbsensi->log_type === 2) {
                        if ($rowAbsensi->log_time !== '00:00:00') {
                            $jamShiftPulang = new \DateTime($rowAbsensi->log_date . ' ' . $jamPulang, $timezone);
                            $jamAbsensiPulang = new \DateTime($rowAbsensi->log_date . ' ' . $rowAbsensi->log_time, $timezone);
                            $comparePulang = $jamShiftPulang->diff($jamAbsensiPulang);

                            if ($comparePulang->invert === 1) {
                                $countJamPulangAwal += (int) $comparePulang->format('%h');
                                $countMenitPulangAwal += (int) $comparePulang->format('%i');
                                $jmlPulangAwal += 1;
                                #$model[] = ['tgl' => $rowAbsensi->log_date, 'waktu' => $rowAbsensi->log_time, 'jam' => $comparePulang->format('%h'), 'menit' => $comparePulang->format('%i')];
                            }
                        }
                    }
                }
                $terlambat = $countJamTerlambat + (round($countMenitTerlambat / 60));
                $pulangAwal = $countJamPulangAwal + (round($countMenitPulangAwal / 60));
                $arrData = [
                    'terlambat' => $terlambat,
                    'totalTerlambat' => $jmlTerlambat,
                    'pulangAwal' => $pulangAwal,
                    'totalPulangAwal' => $jmlPulangAwal,
                    'total' => $jmlTerlambat + $jmlPulangAwal,
                    'totalJam' => $terlambat + $pulangAwal
                ];
            } else {
                $arrData = ['terlambat' => '0', 'totalTerlambat' => '0', 'pulangAwal' => '0', 'totalPulangAwal' => '0', 'total' => '0', 'totalJam' => '0'];
            }
        }
        return $arrData;
    }

    /**
     * 
     * @return type
     */
    public function actionLaporanRekapAbsensi() {
        $idKaryawan = '';
        $model = [];
        $arrKaryawan = [];
        $thn = '';
        $tagTitle = '';
        if (count(Yii::$app->request->post()) > 0) {
            $thn = Yii::$app->request->post('thn');
            $karyawan = Yii::$app->request->post('id_karyawan');
            if ($karyawan === '') {
                $tagTitle = 'Semua Karyawan';
                $modelKaryawan = \app\models\VKaryawan::find()->where('id_status IN ("1","2","3","4","8","9")')->all();
                if (count($modelKaryawan) > 0 && $modelKaryawan !== false) {
                    foreach ($modelKaryawan as $rowKaryawan) {
                        $arrKaryawan[$rowKaryawan->id_karyawan] = ['nik' => $rowKaryawan->nik, 'nama' => $rowKaryawan->nama, 'doj' => $rowKaryawan->tgl_bergabung];
                        for ($month = 1; $month < 13; $month++) {
                            $model[$rowKaryawan->id_karyawan][$month] = $this->dataRekapAbsensi($rowKaryawan->id_karyawan, $month, $thn);
                        }
                    }
                }
            } else {
                $rowKaryawan = \app\models\VKaryawan::find()->where(['id_karyawan' => $karyawan])->one();
                $tagTitle = $rowKaryawan->nama;
                $arrKaryawan[$rowKaryawan->id_karyawan] = ['nik' => $rowKaryawan->nik, 'nama' => $rowKaryawan->nama, 'doj' => $rowKaryawan->tgl_bergabung];
                for ($month = 1; $month < 13; $month++) {
                    $model[$karyawan][$month] = $this->dataRekapAbsensi($karyawan, $month, $thn);
                }
            }
            /** echo '<pre>';
              print_r($model);
              echo '</pre>'; * */
        }
        return $this->render('lap_rekap_absensi', ['idKaryawan' => $idKaryawan, 'model' => $model, 'arrKaryawan' => $arrKaryawan, 'thn' => $thn, 'tagTitle' => $tagTitle]);
    }

    /**
     * 
     * @return type
     */
    public function actionPrintLaporanRekapAbsensi() {
        $idKaryawan = '';
        $model = [];
        $arrKaryawan = [];
        $thn = '';
        $tagTitle = '';
        if (count(Yii::$app->request->get()) > 0) {
            $thn = Yii::$app->request->get('thn');
            $karyawan = Yii::$app->request->get('id_karyawan');
            if ($karyawan === '') {
                $tagTitle = 'Semua Karyawan';
                $modelKaryawan = \app\models\VKaryawan::find()->where('id_status IN ("1","2","3","4","8","9")')->all();
                if (count($modelKaryawan) > 0 && $modelKaryawan !== false) {
                    foreach ($modelKaryawan as $rowKaryawan) {
                        $arrKaryawan[$rowKaryawan->id_karyawan] = ['nik' => $rowKaryawan->nik, 'nama' => $rowKaryawan->nama, 'doj' => $rowKaryawan->tgl_bergabung];
                        for ($month = 1; $month < 13; $month++) {
                            $model[$rowKaryawan->id_karyawan][$month] = $this->dataRekapAbsensi($rowKaryawan->id_karyawan, $month, $thn);
                        }
                    }
                }
            } else {
                $rowKaryawan = \app\models\VKaryawan::find()->where(['id_karyawan' => $karyawan])->one();
                $tagTitle = $rowKaryawan->nama;
                $arrKaryawan[$rowKaryawan->id_karyawan] = ['nik' => $rowKaryawan->nik, 'nama' => $rowKaryawan->nama, 'doj' => $rowKaryawan->tgl_bergabung];
                for ($month = 1; $month < 13; $month++) {
                    $model[$karyawan][$month] = $this->dataRekapAbsensi($karyawan, $month, $thn);
                }
            }
        }
        return $this->renderPartial('print_lap_rekap_absensi', ['idKaryawan' => $idKaryawan, 'model' => $model, 'arrKaryawan' => $arrKaryawan, 'thn' => $thn, 'tagTitle' => $tagTitle]);
    }

    /**
     * 
     * @param type $idKaryawan
     * @param type $thn
     * @return array
     */
    protected function dataRekapTipeAbsensi($idKaryawan, $thn) {
        $arrData = [];
        return $arrData;
    }

    /**
     * 
     * @param type $idKaryawan
     * @param type $month
     * @param type $thn
     * @return int
     */
    protected function dataCuti($idKaryawan, $month, $thn) {
        $timezone = new \DateTimeZone('Asia/Jakarta');
        $cuti = 0;
        $modelAbsensi = \app\models\KaryawanAbsensi::find()->where(['id_karyawan' => $idKaryawan, 'YEAR(tgl_absensi)' => $thn, 'MONTH(tgl_absensi)' => $month, 'id_tipe_absensi' => '5'])->all();
        if (count($modelAbsensi) > 0 && $modelAbsensi !== false) {
            foreach ($modelAbsensi as $rowAbsensi) {
                $cuti += 1;
            }
        }
        return $cuti;
    }

    /**
     * 
     * @param type $idKaryawan
     * @param type $month
     * @param type $thn
     * @return type
     */
    protected function dataLembur($idKaryawan, $month, $thn) {
        $lembur = 0;
        $jamPulang = '19:00:00';
        $timezone = new \DateTimeZone('Asia/Jakarta');

        $ot = 0;
        $countJamOT = 0;
        $countMenitOT = 0;
        $finger = \app\models\KaryawanFingerId::findOne(['id_karyawan' => $idKaryawan]);
        if (count($finger) > 0 && $finger !== false) {
            $modelAbsensi = \app\models\LogAbsensi::find()->where(['log_finger_id' => $finger, 'YEAR(log_date)' => $thn, 'MONTH(log_date)' => $month, 'log_type' => '2'])->all();
            if (count($modelAbsensi) > 0) {
                foreach ($modelAbsensi as $rowAbsensi) {
                    $jamShiftPulang = new \DateTime($rowAbsensi->log_date . ' ' . $jamPulang, $timezone);
                    $jamAbsensiPulang = new \DateTime($rowAbsensi->log_date . ' ' . $rowAbsensi->log_time, $timezone);
                    $comparePulang = $jamShiftPulang->diff($jamAbsensiPulang);
                    if ($comparePulang->invert !== 1) {
                        $countJamOT += (int) $comparePulang->format('%h');
                        $countMenitOT += (int) $comparePulang->format('%i');
                    }
                }
            }
        }
        $ot = $countJamOT + (round($countMenitOT / 60));
        $lembur = $ot;

        return $lembur;
    }

    /**
     * 
     * @return type
     */
    public function actionLaporanRekapTipeAbsensi() {
        $idKaryawan = '';
        $modelCuti = [];
        $modelOT = [];
        $arrKaryawan = [];
        $thn = '';
        $tagTitle = '';
        $quotaCuti = 0;
        if (count(Yii::$app->request->post()) > 0) {
            $thn = Yii::$app->request->post('thn');
            $tagTitle = 'Semua Karyawan';
            $modelQuotaCuti = \app\models\QuotaCuti::findOne(['tahun' => $thn]);
            if (count($modelQuotaCuti) > 0 && $modelQuotaCuti !== false) {
                $quotaCuti = (int) $modelQuotaCuti->jml;
            }
            $karyawan = Yii::$app->request->post('id_karyawan');
            if ($karyawan === '') {
                $modelKaryawan = \app\models\VKaryawan::find()->where('id_status IN ("1","2","3","4","8","9")')->all();
                if (count($modelKaryawan) > 0 && $modelKaryawan !== false) {
                    foreach ($modelKaryawan as $rowKaryawan) {
                        $arrKaryawan[$rowKaryawan->id_karyawan] = ['nik' => $rowKaryawan->nik, 'nama' => $rowKaryawan->nama, 'doj' => $rowKaryawan->tgl_bergabung];
                        for ($month = 1; $month < 13; $month++) {
                            $modelCuti[$rowKaryawan->id_karyawan][$month] = $this->dataCuti($rowKaryawan->id_karyawan, $month, $thn);
                            $modelOT[$rowKaryawan->id_karyawan][$month] = $this->dataLembur($rowKaryawan->id_karyawan, $month, $thn);
                        }
                    }
                }
            } else {
                $rowKaryawan = \app\models\VKaryawan::find()->where(['id_karyawan' => $karyawan])->one();
                $arrKaryawan[$rowKaryawan->id_karyawan] = ['nik' => $rowKaryawan->nik, 'nama' => $rowKaryawan->nama, 'doj' => $rowKaryawan->tgl_bergabung];
                $tagTitle = $rowKaryawan->nama;
                for ($month = 1; $month < 13; $month++) {
                    $modelCuti[$karyawan][$month] = $this->dataCuti($karyawan, $month, $thn);
                    $modelOT[$karyawan][$month] = $this->dataLembur($karyawan, $month, $thn);
                }
            }
            #echo '<pre>';
            #print_r($modelOT);
            #echo '</pre>';
        }

        return $this->render('lap_rekap_tipe_absensi', ['idKaryawan' => $idKaryawan, 'modelCuti' => $modelCuti, 'modelOT' => $modelOT, 'thn' => $thn, 'arrKaryawan' => $arrKaryawan, 'quotaCuti' => $quotaCuti, 'thn' => $thn, 'tagTitle' => $tagTitle]);
    }

    /**
     * 
     * @return type
     */
    public function actionPrintLaporanRekapTipeAbsensi() {
        $idKaryawan = '';
        $modelCuti = [];
        $modelOT = [];
        $arrKaryawan = [];
        $thn = '';
        $tagTitle = '';
        $quotaCuti = 0;
        if (count(Yii::$app->request->get()) > 0) {
            $thn = Yii::$app->request->get('thn');
            $tagTitle = 'Semua Karyawan';
            $modelQuotaCuti = \app\models\QuotaCuti::findOne(['tahun' => $thn]);
            if (count($modelQuotaCuti) > 0 && $modelQuotaCuti !== false) {
                $quotaCuti = (int) $modelQuotaCuti->jml;
            }
            $karyawan = Yii::$app->request->get('id_karyawan');

            #var_dump(Yii::$app->request->get());exit;
            if ($karyawan === '') {
                $modelKaryawan = \app\models\VKaryawan::find()->where('id_status IN ("1","2","3","4","8","9")')->all();
                if (count($modelKaryawan) > 0 && $modelKaryawan !== false) {
                    foreach ($modelKaryawan as $rowKaryawan) {
                        $arrKaryawan[$rowKaryawan->id_karyawan] = ['nik' => $rowKaryawan->nik, 'nama' => $rowKaryawan->nama, 'doj' => $rowKaryawan->tgl_bergabung];
                        for ($month = 1; $month < 13; $month++) {
                            $modelCuti[$rowKaryawan->id_karyawan][$month] = $this->dataCuti($rowKaryawan->id_karyawan, $month, $thn);
                            $modelOT[$rowKaryawan->id_karyawan][$month] = $this->dataLembur($rowKaryawan->id_karyawan, $month, $thn);
                        }
                    }
                }
            } else {
                $rowKaryawan = \app\models\VKaryawan::find()->where(['id_karyawan' => $karyawan])->one();
                $arrKaryawan[$rowKaryawan->id_karyawan] = ['nik' => $rowKaryawan->nik, 'nama' => $rowKaryawan->nama, 'doj' => $rowKaryawan->tgl_bergabung];
                $tagTitle = $rowKaryawan->nama;
                for ($month = 1; $month < 13; $month++) {
                    $modelCuti[$karyawan][$month] = $this->dataCuti($karyawan, $month, $thn);
                    $modelOT[$karyawan][$month] = $this->dataLembur($karyawan, $month, $thn);
                }
            }
            #echo '<pre>';
            #print_r($modelOT);
            #echo '</pre>';
        }

        return $this->renderPartial('print_lap_rekap_tipe_absensi', ['idKaryawan' => $idKaryawan, 'modelCuti' => $modelCuti, 'modelOT' => $modelOT, 'thn' => $thn, 'arrKaryawan' => $arrKaryawan, 'quotaCuti' => $quotaCuti, 'thn' => $thn, 'tagTitle' => $tagTitle]);
    }

    /**
     * 
     * @param type $idKaryawan
     * @param type $thn
     * @return type
     */
    protected function dataAkhirAbsensi($idKaryawan, $thn) {
        $arrData = [];
        $absensi = [
            '2' => 0,
            '3' => 0,
            '4' => 0,
            '5' => 0,
            '7' => 0
        ];

        foreach ($absensi as $key => $val) {
            $where = ['id_karyawan' => $idKaryawan, 'YEAR(tgl_absensi)' => $thn, 'id_tipe_absensi' => $key];
            $row = (new \yii\db\Query)->select('COUNT(id_karyawan_absensi) AS jml')->from('karyawan_absensi')
                            ->where($where)->one();
            if (count($row) > 0 && $row !== false) {
                $arrData[$key] = $val + $row['jml'];
            }
            #var_dump($key);
        }
        return $arrData;
    }

    /**
     * 
     * @return type
     */
    public function actionLaporanAkhirAbsensi() {
        $idKaryawan = '';
        $model = [];
        $arrKaryawan = [];
        $quotaCuti = 0;
        $thn = '';
        $tagTitle = '';
        $totalSetahunMasuk = 0;
        $kalenderKerjaSetahun = 0;
        $modelKerja = [];
        $modelOT = [];
        $totalOT = 0;
        $modelPAT = [];
        if (count(Yii::$app->request->post()) > 0) {
            $thn = Yii::$app->request->post('thn');
            $karyawan = Yii::$app->request->post('id_karyawan');
            $modelQuotaCuti = \app\models\QuotaCuti::findOne(['tahun' => $thn]);
            $tagTitle = 'Semua Karyawan';
            $modelKalenderKerja = \app\models\KalenderKerja::findAll(['thn' => $thn]);
            if (count($modelKalenderKerja) > 0 && $modelKalenderKerja !== false) {
                foreach ($modelKalenderKerja as $rowKalenderKerja) {
                    $kalenderKerjaSetahun += $rowKalenderKerja['hari_kerja'];
                }
            }
            if (count($modelQuotaCuti) > 0 && $modelQuotaCuti !== false) {
                $quotaCuti = (int) $modelQuotaCuti->jml;
            }
            if ($karyawan === '') {
                $modelKaryawan = \app\models\VKaryawan::find()->where('id_status IN ("1","2","3","4","8","9")')->all();
                if (count($modelKaryawan) > 0 && $modelKaryawan !== false) {
                    foreach ($modelKaryawan as $rowKaryawan) {
                        $arrPAT = [
                            'terlambat' => 0,
                            'totalTerlambat' => 0,
                            'pulangAwal' => 0,
                            'totalPulangAwal' => 0,
                            'total' => 0,
                            'totalJam' => 0
                        ];
                        for ($month = 1; $month < 13; $month++) {
                            $arrHadir = $this->dataRekapKehadiranKaryawan($rowKaryawan->id_karyawan, $month, $thn);
                            if (count($arrHadir) > 0) {
                                $totalSetahunMasuk += ($arrHadir['hadir'] + $arrHadir['masukLibur']);
                            }
                            $totalOT += $this->dataLembur($rowKaryawan->id_karyawan, $month, $thn);
                            $arrDataPAT = $this->dataRekapAbsensi($rowKaryawan->id_karyawan, $month, $thn);
                            if (count($arrDataPAT) > 0) {
                                foreach ($arrDataPAT as $key => $val) {
                                    if (array_key_exists($key, $arrPAT) === true) {
                                        $arrPAT[$key] += $val;
                                    }
                                }
                            }
                        }
                        $arrKaryawan[$rowKaryawan->id_karyawan] = ['nik' => $rowKaryawan->nik, 'nama' => $rowKaryawan->nama, 'doj' => $rowKaryawan->tgl_bergabung];
                        $model[$rowKaryawan->id_karyawan] = $this->dataAkhirAbsensi($rowKaryawan->id_karyawan, $thn);
                        $modelKerja[$rowKaryawan->id_karyawan] = ['kerja' => $totalSetahunMasuk, 'totalTahun' => $kalenderKerjaSetahun];
                        $modelOT[$rowKaryawan->id_karyawan] = $totalOT;
                        $modelPAT[$rowKaryawan->id_karyawan] = $arrPAT;
                    }
                }
            } else {
                $arrPAT = [
                    'terlambat' => 0,
                    'totalTerlambat' => 0,
                    'pulangAwal' => 0,
                    'totalPulangAwal' => 0,
                    'total' => 0,
                    'totalJam' => 0
                ];
                for ($month = 1; $month < 13; $month++) {
                    $arrHadir = $this->dataRekapKehadiranKaryawan($karyawan, $month, $thn);
                    if (count($arrHadir) > 0) {
                        $totalSetahunMasuk += ($arrHadir['hadir'] + $arrHadir['masukLibur']);
                    }
                    $totalOT += $this->dataLembur($karyawan, $month, $thn);
                    $arrDataPAT = $this->dataRekapAbsensi($karyawan, $month, $thn);
                    if (count($arrDataPAT) > 0) {
                        foreach ($arrDataPAT as $key => $val) {
                            if (array_key_exists($key, $arrPAT) === true) {
                                $arrPAT[$key] += $val;
                            }
                        }
                    }
                }
                $rowKaryawan = \app\models\VKaryawan::find()->where(['id_karyawan' => $karyawan])->one();
                $arrKaryawan[$rowKaryawan->id_karyawan] = ['nik' => $rowKaryawan->nik, 'nama' => $rowKaryawan->nama, 'doj' => $rowKaryawan->tgl_bergabung];
                $tagTitle = $rowKaryawan->nama;
                $model[$karyawan] = $this->dataAkhirAbsensi($karyawan, $thn); #array_merge($this->dataAkhirAbsensi($karyawan, $thn), ['kerja' => $totalSetahunMasuk, 'totalTahun' => $kalenderKerjaSetahun]);
                $modelKerja[$karyawan] = ['kerja' => $totalSetahunMasuk, 'totalTahun' => $kalenderKerjaSetahun];
                $modelOT[$karyawan] = $totalOT;
                $modelPAT[$karyawan] = $arrPAT;
            }
        }
        #var_dump($modelOT);exit;
        return $this->render('lap_akhir_absensi', ['idKaryawan' => $idKaryawan, 'model' => $model, 'modelKerja' => $modelKerja, 'modelOT' => $modelOT, 'modelPAT' => $modelPAT, 'arrKaryawan' => $arrKaryawan, 'quotaCuti' => $quotaCuti, 'thn' => $thn, 'tagTitle' => $tagTitle]);
    }

    /**
     * 
     * @return type
     */
    public function actionPrintLaporanAkhirAbsensi() {
        $idKaryawan = '';
        $model = [];
        $arrKaryawan = [];
        $quotaCuti = 0;
        $thn = '';
        $tagTitle = '';
        $totalSetahunMasuk = 0;
        $kalenderKerjaSetahun = 0;
        $modelKerja = [];
        $modelOT = [];
        $totalOT = 0;
        $modelPAT = [];
        if (count(Yii::$app->request->get()) > 0) {
            $thn = Yii::$app->request->get('thn');
            $karyawan = Yii::$app->request->get('id_karyawan');
            $modelQuotaCuti = \app\models\QuotaCuti::findOne(['tahun' => $thn]);
            $tagTitle = 'Semua Karyawan';
            $modelKalenderKerja = \app\models\KalenderKerja::findAll(['thn' => $thn]);
            if (count($modelKalenderKerja) > 0 && $modelKalenderKerja !== false) {
                foreach ($modelKalenderKerja as $rowKalenderKerja) {
                    $kalenderKerjaSetahun += $rowKalenderKerja['hari_kerja'];
                }
            }
            if (count($modelQuotaCuti) > 0 && $modelQuotaCuti !== false) {
                $quotaCuti = (int) $modelQuotaCuti->jml;
            }

            if ($karyawan === '') {
                $modelKaryawan = \app\models\VKaryawan::find()->where('id_status IN ("1","2","3","4","8","9")')->all();
                if (count($modelKaryawan) > 0 && $modelKaryawan !== false) {
                    foreach ($modelKaryawan as $rowKaryawan) {
                        $arrPAT = [
                            'terlambat' => 0,
                            'totalTerlambat' => 0,
                            'pulangAwal' => 0,
                            'totalPulangAwal' => 0,
                            'total' => 0,
                            'totalJam' => 0
                        ];
                        for ($month = 1; $month < 13; $month++) {
                            $arrHadir = $this->dataRekapKehadiranKaryawan($rowKaryawan->id_karyawan, $month, $thn);
                            if (count($arrHadir) > 0) {
                                $totalSetahunMasuk += ($arrHadir['hadir'] + $arrHadir['masukLibur']);
                            }
                            $totalOT += $this->dataLembur($rowKaryawan->id_karyawan, $month, $thn);
                            $arrDataPAT = $this->dataRekapAbsensi($rowKaryawan->id_karyawan, $month, $thn);
                            if (count($arrDataPAT) > 0) {
                                foreach ($arrDataPAT as $key => $val) {
                                    if (array_key_exists($key, $arrPAT) === true) {
                                        $arrPAT[$key] += $val;
                                    }
                                }
                            }
                        }
                        $arrKaryawan[$rowKaryawan->id_karyawan] = ['nik' => $rowKaryawan->nik, 'nama' => $rowKaryawan->nama, 'doj' => $rowKaryawan->tgl_bergabung];
                        $model[$rowKaryawan->id_karyawan] = $this->dataAkhirAbsensi($rowKaryawan->id_karyawan, $thn);
                        $modelKerja[$rowKaryawan->id_karyawan] = ['kerja' => $totalSetahunMasuk, 'totalTahun' => $kalenderKerjaSetahun];
                        $modelOT[$rowKaryawan->id_karyawan] = $totalOT;
                        $modelPAT[$rowKaryawan->id_karyawan] = $arrPAT;
                    }
                }
            } else {
                $arrPAT = [
                    'terlambat' => 0,
                    'totalTerlambat' => 0,
                    'pulangAwal' => 0,
                    'totalPulangAwal' => 0,
                    'total' => 0,
                    'totalJam' => 0
                ];
                for ($month = 1; $month < 13; $month++) {
                    $arrHadir = $this->dataRekapKehadiranKaryawan($karyawan, $month, $thn);
                    if (count($arrHadir) > 0) {
                        $totalSetahunMasuk += ($arrHadir['hadir'] + $arrHadir['masukLibur']);
                    }
                    $totalOT += $this->dataLembur($karyawan, $month, $thn);
                    $arrDataPAT = $this->dataRekapAbsensi($karyawan, $month, $thn);
                    if (count($arrDataPAT) > 0) {
                        foreach ($arrDataPAT as $key => $val) {
                            if (array_key_exists($key, $arrPAT) === true) {
                                $arrPAT[$key] += $val;
                            }
                        }
                    }
                }
                $rowKaryawan = \app\models\VKaryawan::find()->where(['id_karyawan' => $karyawan])->one();
                $arrKaryawan[$rowKaryawan->id_karyawan] = ['nik' => $rowKaryawan->nik, 'nama' => $rowKaryawan->nama, 'doj' => $rowKaryawan->tgl_bergabung];
                $tagTitle = $rowKaryawan->nama;
                $model[$karyawan] = $this->dataAkhirAbsensi($karyawan, $thn); #array_merge($this->dataAkhirAbsensi($karyawan, $thn), ['kerja' => $totalSetahunMasuk, 'totalTahun' => $kalenderKerjaSetahun]);
                $modelKerja[$karyawan] = ['kerja' => $totalSetahunMasuk, 'totalTahun' => $kalenderKerjaSetahun];
                $modelOT[$karyawan] = $totalOT;
                $modelPAT[$karyawan] = $arrPAT;
            }
        }
        return $this->renderPartial('print_lap_akhir_absensi', ['idKaryawan' => $idKaryawan, 'model' => $model, 'modelKerja' => $modelKerja, 'modelOT' => $modelOT, 'modelPAT' => $modelPAT, 'arrKaryawan' => $arrKaryawan, 'quotaCuti' => $quotaCuti, 'thn' => $thn, 'tagTitle' => $tagTitle]);
    }

    /**
     * 
     * @param type $idKaryawan
     * @param type $month
     * @param type $thn
     * @return int
     */
    protected function dataRekapKehadiranKaryawan($idKaryawan, $month, $thn) {
        $arrData = [];
        $finger = \app\models\KaryawanFingerId::findOne(['id_karyawan' => $idKaryawan]);
        if (count($finger) > 0 && $finger !== false) {
            $hadir = 0;
            $masukLibur = 0;
            $modelAbsensi = \app\models\LogAbsensi::find()->where(['log_finger_id' => $finger, 'YEAR(log_date)' => $thn, 'MONTH(log_date)' => $month, 'log_type' => '1'])->all();
            if (count($modelAbsensi) > 0 && $modelAbsensi !== false) {
                foreach ($modelAbsensi as $rowAbsensi) {
                    if ($rowAbsensi->log_date !== '0000-00-00' && $rowAbsensi->log_time !== '00:00:00') {
                        $rowLibur = \app\models\KalenderLibur::findOne(['thn_libur' => $thn, 'tgl_libur' => $rowAbsensi->log_date]);
                        if (count($rowLibur) > 0 && $rowLibur !== false) {
                            $masukLibur += 1;
                        } else {
                            $hadir += 1;
                        }
                    }
                }
            }
            $arrData = ['hadir' => $hadir, 'masukLibur' => $masukLibur];
        }
        return $arrData;
    }

    /**
     * 
     * @return type
     */
    public function actionLaporanRekapitulasiKehadiranKaryawan() {
        $idKaryawan = '';
        $model = [];
        $arrKaryawan = [];
        $arrKalenderKerja = [];
        $thn = '';
        $tagTitle = '';
        if (count(Yii::$app->request->post()) > 0) {
            $thn = Yii::$app->request->post('thn');
            $karyawan = Yii::$app->request->post('id_karyawan');
            $modelKalenderKerja = \app\models\KalenderKerja::findAll(['thn' => $thn]);
            $tagTitle = 'Semua Karyawan';
            if (count($modelKalenderKerja) > 0 && $modelKalenderKerja !== false) {
                foreach ($modelKalenderKerja as $rowKalenderKerja) {
                    $arrKalenderKerja[$rowKalenderKerja['bulan']] = $rowKalenderKerja['hari_kerja'];
                }
            }
            if ($karyawan === '') {
                $modelKaryawan = \app\models\VKaryawan::find()->where('id_status IN ("1","2","3","4","8","9")')->all();
                if (count($modelKaryawan) > 0 && $modelKaryawan !== false) {
                    foreach ($modelKaryawan as $rowKaryawan) {
                        $arrKaryawan[$rowKaryawan->id_karyawan] = ['nik' => $rowKaryawan->nik, 'nama' => $rowKaryawan->nama, 'doj' => $rowKaryawan->tgl_bergabung];

                        for ($month = 1; $month < 13; $month++) {
                            $model[$rowKaryawan->id_karyawan][$month] = $this->dataRekapKehadiranKaryawan($rowKaryawan->id_karyawan, $month, $thn);
                        }
                    }
                }
            } else {
                $rowKaryawan = \app\models\VKaryawan::find()->where(['id_karyawan' => $karyawan])->one();
                $arrKaryawan[$rowKaryawan->id_karyawan] = ['nik' => $rowKaryawan->nik, 'nama' => $rowKaryawan->nama, 'doj' => $rowKaryawan->tgl_bergabung];
                $tagTitle = $rowKaryawan->nama;
                for ($month = 1; $month < 13; $month++) {
                    $model[$karyawan][$month] = $this->dataRekapKehadiranKaryawan($karyawan, $month, $thn);
                }
            }
        }
        return $this->render('lap_rekap_kehadiran_karyawan', ['idKaryawan' => $idKaryawan, 'model' => $model, 'arrKaryawan' => $arrKaryawan, 'arrKalenderKerja' => $arrKalenderKerja, 'thn' => $thn, 'tagTitle' => $tagTitle]);
    }

    /**
     * 
     * @return type
     */
    public function actionPrintLaporanRekapKehadiranKaryawan() {
        $idKaryawan = '';
        $model = [];
        $arrKaryawan = [];
        $arrKalenderKerja = [];
        $thn = '';
        $tagTitle = '';
        if (count(Yii::$app->request->get()) > 0) {
            $thn = Yii::$app->request->get('thn');
            $karyawan = Yii::$app->request->get('id_karyawan');
            $modelKalenderKerja = \app\models\KalenderKerja::findAll(['thn' => $thn]);
            $tagTitle = 'Semua Karyawan';
            if (count($modelKalenderKerja) > 0 && $modelKalenderKerja !== false) {
                foreach ($modelKalenderKerja as $rowKalenderKerja) {
                    $arrKalenderKerja[$rowKalenderKerja['bulan']] = $rowKalenderKerja['hari_kerja'];
                }
            }
            if ($karyawan === '') {
                $modelKaryawan = \app\models\VKaryawan::find()->where('id_status IN ("1","2","3","4","8","9")')->all();
                if (count($modelKaryawan) > 0 && $modelKaryawan !== false) {
                    foreach ($modelKaryawan as $rowKaryawan) {
                        $arrKaryawan[$rowKaryawan->id_karyawan] = ['nik' => $rowKaryawan->nik, 'nama' => $rowKaryawan->nama, 'doj' => $rowKaryawan->tgl_bergabung];
                        for ($month = 1; $month < 13; $month++) {
                            $model[$rowKaryawan->id_karyawan][$month] = $this->dataRekapKehadiranKaryawan($rowKaryawan->id_karyawan, $month, $thn);
                        }
                    }
                }
            } else {
                $rowKaryawan = \app\models\VKaryawan::find()->where(['id_karyawan' => $karyawan])->one();
                $arrKaryawan[$rowKaryawan->id_karyawan] = ['nik' => $rowKaryawan->nik, 'nama' => $rowKaryawan->nama, 'doj' => $rowKaryawan->tgl_bergabung];
                $tagTitle = $rowKaryawan->nama;
                for ($month = 1; $month < 13; $month++) {
                    $model[$karyawan][$month] = $this->dataRekapKehadiranKaryawan($karyawan, $month, $thn);
                }
            }
        }
        return $this->renderPartial('print_lap_rekap_kehadiran_karyawan', ['idKaryawan' => $idKaryawan, 'model' => $model, 'arrKaryawan' => $arrKaryawan, 'arrKalenderKerja' => $arrKalenderKerja, 'thn' => $thn, 'tagTitle' => $tagTitle]);
    }

    /**
     * Finds the Karyawan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return Karyawan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Karyawan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
