<?php

namespace app\controllers;

use Yii;
use app\models\Penggajian;
use app\models\PenggajianSearch;
use app\models\PenggajianKaryawan;
use app\models\VKaryawan;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

#use kartik\mpdf\Pdf;

/**
 * PenggajianController implements the CRUD actions for Penggajian model.
 */
class PenggajianController extends Controller {

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
     * Lists all Penggajian models.
     *
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PenggajianSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render(
                        'index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                        ]
        );
    }

    /**
     * Displays a single Penggajian model.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionView($id) {
        $model = $this->findModel($id);
        $modelKaryawan = new VKaryawan();
        $recordKaryawan = $modelKaryawan->findAll(['id_perusahaan' => $model->id_perusahaan]);
        $arrDataGajian = [];
        $modelPenggajianKaryawan = new PenggajianKaryawan();
        $recordPenggajianKaryawan = $modelPenggajianKaryawan->findAll(['id_penggajian' => $id]);
        $komponen = (new \yii\db\Query())->select(
                        'penggajian_komponen.id_komponen AS id_komponen, komponen_gaji.nm_komponen AS nm_komponen'
                )->from('penggajian_komponen')->innerJoin(
                        'komponen_gaji', 'komponen_gaji.id_komponen=penggajian_komponen.id_komponen'
                )->where(['penggajian_komponen.id_penggajian' => $id])->all();
        if (count($recordPenggajianKaryawan) > 0) {
            foreach ($recordPenggajianKaryawan as $row) {
                $arrDataGajian[$row->id_karyawan] = ['pendapatan' => $row->pendapatan, 'potongan' => $row->potongan];
            }
        }
        return $this->render(
                        'view', [
                    'model' => $model,
                    'modelKaryawan' => $recordKaryawan,
                    'arrDataGajian' => $arrDataGajian,
                    'arrKomponen' => $komponen
                        ]
        );
    }

    /**
     * Creates a new Penggajian model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate() {
        $model = new Penggajian();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render(
                            'create', [
                        'model' => $model,
                            ]
            );
        }
    }

    /**
     * @param $id
     * @param $id_karyawan
     *
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionViewSlip($id, $id_karyawan) {
        $model = $this->findModel($id);
        $modelInformasiPribadi = new VKaryawan();
        $modelPerusahaan = new \app\models\Perusahaan();
        $modelPenggajianKaryawan = new PenggajianKaryawan();
        $idPK = '';
        $arrKomponen = [];
        $arrDetail = [];
        if (count($model) > 0) {
            $recordPerusahaan = $modelPerusahaan->findOne(['id' => $model->id_perusahaan]);
            $recordInformasiPribadi = $modelInformasiPribadi->findOne(['id_karyawan' => $id_karyawan]);
            $recordPenggajianKaryawan = $modelPenggajianKaryawan->find()->select(['id_pk'])->where(
                            ['id_penggajian' => $id, 'id_karyawan' => $id_karyawan]
                    )->one();
            if (count($recordPenggajianKaryawan) > 0) {
                $idPK = $recordPenggajianKaryawan['id_pk'];
            }
        }
        if ($idPK !== '') {
            $record = (new \yii\db\Query())->select(
                            'penggajian_karyawan_detail.id_komponen AS id_komponen, penggajian_karyawan_detail.jumlah AS jumlah, penggajian_karyawan_detail.nominal AS nominal, penggajian_karyawan_detail.subtotal AS subtotal, komponen_gaji.nm_komponen AS nm_komponen, komponen_gaji.kategori_komponen AS kategori_komponen'
                    )->from('penggajian_karyawan_detail')->innerJoin(
                            'komponen_gaji', 'komponen_gaji.id_komponen=penggajian_karyawan_detail.id_komponen'
                    )->where(
                            ['id_pk' => $idPK]
                    )->all();
            if (count($record) > 0) {
                foreach ($record as $row) {
                    $arrDetail[$row['id_komponen']] = [
                        'jumlah' => $row['jumlah'],
                        'nominal' => $row['nominal'],
                        'subtotal' => $row['subtotal'],
                        'nm_komponen' => $row['nm_komponen'],
                        'kategori_komponen' => $row['kategori_komponen']
                    ];
                }
            }
            $recordKomponen = (new \yii\db\Query())->select(
                            'komponen_gaji_karyawan.id_komponen AS id_komponen, komponen_gaji.nm_komponen AS nm_komponen, komponen_gaji.kategori_komponen AS kategori_komponen'
                    )->from('komponen_gaji_karyawan')->innerJoin(
                            'komponen_gaji', 'komponen_gaji_karyawan.id_komponen=komponen_gaji.id_komponen'
                    )->where(['id_karyawan' => $id_karyawan])->orderBy('komponen_gaji.kategori_komponen')->all();
            if (count($recordKomponen) > 0) {
                foreach ($recordKomponen as $row) {
                    $arrKomponen[$row['id_komponen']] = [
                        'jumlah' => '',
                        'nominal' => '0',
                        'subtotal' => '0',
                        'nm_komponen' => $row['nm_komponen'],
                        'kategori_komponen' => $row['kategori_komponen']
                    ];
                }
            }
        }
        return $this->renderPartial(
                        'slip', [
                    'model' => $model,
                    'id_karyawan' => $id_karyawan,
                    'informasi_pribadi' => $recordInformasiPribadi,
                    'perusahaan' => $recordPerusahaan,
                    'detail' => $arrDetail,
                    'komponen' => $arrKomponen
                        ]
        );
    }

    /**
     * @param $id
     * @param $id_karyawan
     *
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionCetakSlipPdf($id, $id_karyawan) {
        $model = $this->findModel($id);
        $modelInformasiPribadi = new VKaryawan();
        $modelPerusahaan = new \app\models\Perusahaan();
        $modelPenggajianKaryawan = new PenggajianKaryawan();
        $idPK = '';
        $arrKomponen = [];
        $arrDetail = [];
        $totalRowsPendapatan = 0;
        $totalRowsPotongan = 0;
        if (count($model) > 0) {
            $recordPerusahaan = $modelPerusahaan->findOne(['id' => $model->id_perusahaan]);
            $recordInformasiPribadi = $modelInformasiPribadi->findOne(['id_karyawan' => $id_karyawan]);
            $recordPenggajianKaryawan = $modelPenggajianKaryawan->find()->select(['id_pk'])->where(
                            ['id_penggajian' => $id, 'id_karyawan' => $id_karyawan]
                    )->one();
            if (count($recordPenggajianKaryawan) > 0) {
                $idPK = $recordPenggajianKaryawan['id_pk'];
            }
        }
        if ($idPK !== '') {
            $record = (new \yii\db\Query())->select(
                            'penggajian_karyawan_detail.id_komponen AS id_komponen, penggajian_karyawan_detail.jumlah AS jumlah, penggajian_karyawan_detail.nominal AS nominal, penggajian_karyawan_detail.subtotal AS subtotal, komponen_gaji.nm_komponen AS nm_komponen, komponen_gaji.kategori_komponen AS kategori_komponen'
                    )->from('penggajian_karyawan_detail')->innerJoin(
                            'komponen_gaji', 'komponen_gaji.id_komponen=penggajian_karyawan_detail.id_komponen'
                    )->where(
                            ['id_pk' => $idPK]
                    )->all();
            if (count($record) > 0) {
                foreach ($record as $row) {
                    $arrDetail[$row['id_komponen']] = [
                        'jumlah' => $row['jumlah'],
                        'nominal' => $row['nominal'],
                        'subtotal' => $row['subtotal'],
                        'nm_komponen' => $row['nm_komponen'],
                        'kategori_komponen' => $row['kategori_komponen']
                    ];
                }
            }
            $recordKomponen = (new \yii\db\Query())->select(
                            'komponen_gaji_karyawan.id_komponen AS id_komponen, komponen_gaji.nm_komponen AS nm_komponen, komponen_gaji.kategori_komponen AS kategori_komponen'
                    )->from('komponen_gaji_karyawan')->innerJoin(
                            'komponen_gaji', 'komponen_gaji_karyawan.id_komponen=komponen_gaji.id_komponen'
                    )->where(['id_karyawan' => $id_karyawan])->orderBy('komponen_gaji.kategori_komponen')->all();
            if (count($recordKomponen) > 0) {
                foreach ($recordKomponen as $row) {
                    $arrKomponen[$row['id_komponen']] = [
                        'jumlah' => '',
                        'nominal' => '0',
                        'subtotal' => '0',
                        'nm_komponen' => $row['nm_komponen'],
                        'kategori_komponen' => $row['kategori_komponen']
                    ];
                    if ($row['kategori_komponen'] === 'Gaji Pokok') {
                        $totalRowsPendapatan++;
                    } else if ($row['kategori_komponen'] === 'Pendapatan') {
                        $totalRowsPendapatan++;
                    } else {
                        $totalRowsPotongan++;
                    }
                }
            }
        }
        $content = $this->renderPartial(
                'cetak_slip', [
            'model' => $model,
            'id_karyawan' => $id_karyawan,
            'informasi_pribadi' => $recordInformasiPribadi,
            'perusahaan' => $recordPerusahaan,
            'detail' => $arrDetail,
            'komponen' => $arrKomponen,
            'total_rows_pendapatan' => $totalRowsPendapatan,
            'total_rows_potongan' => $totalRowsPotongan
                ]
        );
        $pdf = new Pdf();
        $mpdf = $pdf->api;
        $mpdf->SetHeader(
                'Cetak Slip Gaji'
        );
        $mpdf->SetFooter('{PAGENO}');
        $mpdf->AddPage(
                'P', // L - landscape, P - portrait
                '', '', '', '', 10, // margin_left
                10, // margin right
                30, // margin top
                10, // margin bottom
                18, // margin header
                12
        );
        $mpdf->WriteHtml($content, 2);
        $mpdf->Output();
    }

    /**
     * @param $id
     * @param $id_karyawan
     *
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionCetakSlip($id, $id_karyawan) {
        $model = $this->findModel($id);
        $modelInformasiPribadi = new VKaryawan();
        $modelPerusahaan = new \app\models\Perusahaan();
        $modelPenggajianKaryawan = new PenggajianKaryawan();
        $idPK = '';
        $arrKomponen = [];
        $arrDetail = [];
        $totalRowsPendapatan = 0;
        $totalRowsPotongan = 0;
        $fingerId = 0;
        $totalPendapatan = 0;
        $totalPotongan = 0;
        $biayaLembur = 0;
        $totalBiayaLembur = 0;

        $modelFinger = (new \yii\db\Query())->select('log_finger_id')->from('karyawan_finger_id')->where(['id_karyawan' => $id_karyawan])->one();
        if (count($modelFinger) > 0) {
            $fingerId = $modelFinger['log_finger_id'];
        }

        $bulan = $this->bulanAngka($model->bulan);
        $modelHariKerja = (new \yii\db\Query())->select('hari_kerja')->from('kalender_kerja')->where(['bulan' => $bulan, 'thn' => $model->tahun])->one();
        $arrLembur = $this->hitungLembur($id_karyawan, $fingerId, $model->tgl_awal, $model->tgl_akhir);

        if (count($model) > 0) {
            $recordPerusahaan = $modelPerusahaan->findOne(['id' => $model->id_perusahaan]);
            $recordInformasiPribadi = $modelInformasiPribadi->findOne(['id_karyawan' => $id_karyawan]);
            $recordPenggajianKaryawan = $modelPenggajianKaryawan->find()->select(['id_pk'])->where(
                            ['id_penggajian' => $id, 'id_karyawan' => $id_karyawan]
                    )->one();
            if (count($recordPenggajianKaryawan) > 0) {
                $idPK = $recordPenggajianKaryawan['id_pk'];
            }
        }
        if ($idPK !== '') {
            $arrDetail = $this->komponenPenggajianKaryawan($idPK);
            $recordKomponen = (new \yii\db\Query())->select(
                            'komponen_gaji_karyawan.id_komponen AS id_komponen, komponen_gaji.nm_komponen AS nm_komponen, komponen_gaji.kategori_komponen AS kategori_komponen'
                    )->from('komponen_gaji_karyawan')->innerJoin(
                            'komponen_gaji', 'komponen_gaji_karyawan.id_komponen=komponen_gaji.id_komponen'
                    )->where(['id_karyawan' => $id_karyawan])->orderBy('komponen_gaji.kategori_komponen')->all();
            if (count($recordKomponen) > 0) {
                foreach ($recordKomponen as $row) {
                    $arrKomponen[$row['id_komponen']] = [
                        'jumlah' => '',
                        'nominal' => '0',
                        'subtotal' => '0',
                        'nm_komponen' => $row['nm_komponen'],
                        'kategori_komponen' => $row['kategori_komponen']
                    ];
                    if ($row['kategori_komponen'] === 'Gaji Pokok') {
                        $totalRowsPendapatan++;
                        if (array_key_exists($row['id_komponen'], $arrDetail) === true) {
                            $totalPendapatan += $arrDetail[$row['id_komponen']]['subtotal'];
                        }
                    } else if ($row['kategori_komponen'] === 'Pendapatan') {
                        $totalRowsPendapatan++;
                        if (array_key_exists($row['id_komponen'], $arrDetail) === true) {
                            $totalPendapatan += $arrDetail[$row['id_komponen']]['subtotal'];
                        }
                    } else {
                        $totalRowsPotongan++;
                        $totalPotongan += $arrDetail[$row['id_komponen']]['subtotal'];
                    }
                }
            }
        }

        $section = $this->sectionKaryawan($id_karyawan);

        $modelRekening = (new \yii\db\Query())->select('no_rek')->from('v_karyawan_rekening')->where(['id_karyawan' => $id_karyawan])->one();
        # Hitung Lembur
        $gapok = 0;
        $tunjangan = 0;
        if (count($arrDetail) > 0) {
            if (array_key_exists(2, $arrDetail) === true) {
                $gapok = $arrDetail[2]['subtotal'];
            }
            if (array_key_exists(3, $arrDetail) === true) {
                $tunjangan = $arrDetail['3']['subtotal'];
            }
            $biayaLembur = ($gapok + $tunjangan) / 173;
        }

        if (count($arrLembur) > 0) {
            $jam9 = (int) $arrLembur['jam9'];
            if ($jam9 > 0) {
                $totalBiayaLembur += $jam9 * 1.5 * $biayaLembur;
            }
            $jam10 = (int) $arrLembur['jam10'];
            if ($jam10 > 0) {
                $totalBiayaLembur += $jam10 * 2 * $biayaLembur;
            }
            $jam8Libur = (int) $arrLembur['jam8Libur'];
            if ($jam8Libur > 0) {
                $totalBiayaLembur += $jam8Libur * 2 * $biayaLembur;
            }
        }
        # absensi
        $potonganHarian = 0;
        $hariKerja = (int) $modelHariKerja['hari_kerja'];
        $totalIjinAlpa = 0;
        $arrTotalIjinCuti = $this->getRekapAbsensi($id_karyawan, $model->tgl_awal, $model->tgl_akhir);
        $cuti = 0;
        $sakit = 0;
        $ijin = 0;
        $alpa = 0;
        $pulangAwal = 0;
        $potonganIjin = 0;
        $potonganAlpa = 0;
        $potonganPulangAwal = 0;
        $absensiCutiSakit = 0;

        if (count($arrTotalIjinCuti) > 0) {
            if (array_key_exists(2, $arrTotalIjinCuti) === true) {
                $sakit += $arrTotalIjinCuti[2];
                $absensiCutiSakit += $arrTotalIjinCuti[2];
            }
            if (array_key_exists(3, $arrTotalIjinCuti) === true) {
                $ijin += $arrTotalIjinCuti[3];
                $totalIjinAlpa += $arrTotalIjinCuti[3];
                $potonganIjin += ($arrTotalIjinCuti[3] * 8) * $biayaLembur;
            }
            if (array_key_exists(4, $arrTotalIjinCuti) === true) {
                $alpa += $arrTotalIjinCuti[4];
                $totalIjinAlpa += $arrTotalIjinCuti[4];
                $potonganAlpa += $arrTotalIjinCuti[4] * $biayaLembur;
            }
            if (array_key_exists(5, $arrTotalIjinCuti) === true) {
                $cuti += $arrTotalIjinCuti[5];
                $absensiCutiSakit += $arrTotalIjinCuti[5];
            }
            if (array_key_exists(6, $arrTotalIjinCuti) === true) {
                $pulangAwal += $arrTotalIjinCuti[6];
                $totalIjinAlpa += $arrTotalIjinCuti[6];
                $potonganPulangAwal += $arrTotalIjinCuti[6] * $biayaLembur;
            }
        }

        $potonganIjinAlpaPulang = $potonganIjin + $potonganAlpa + $potonganPulangAwal;
        $kerja = (int) $arrLembur['totalHari'] + $totalIjinAlpa + $absensiCutiSakit;
        if ($hariKerja !== $kerja || $hariKerja === 0) {
            $hitungPendapatan = $gapok + $tunjangan;
            $potonganHarian = round($hitungPendapatan - (($hitungPendapatan / 173 * 8) * $kerja));
        }
        var_dump($potonganHarian);

        # tambahan cuti dan sakit
        if (array_key_exists(4, $arrDetail) === true && $absensiCutiSakit > 0) {
            $arrDetail[4]['subtotal'] += $arrDetail[4]['nominal'] * $absensiCutiSakit;
            $totalPendapatan += $arrDetail[4]['subtotal'];
        }
        # Pendapatan dan Potongan
        $totalPendapatan += round($totalBiayaLembur);
        $totalPendapatan -= $potonganHarian;
        $totalPotongan += $potonganIjinAlpaPulang;
        $thp = round($totalPendapatan - $totalPotongan);
        $thpFix = $this->pembulatan($thp);

        #var_dump($arrTotalIjinCuti);
        var_dump($this->penggajianKaryawan($id, $id_karyawan));
        exit;
        return $this->renderPartial(
                        'mii_slip', [
                    'model' => $model,
                    'id_karyawan' => $id_karyawan,
                    'informasi_pribadi' => $recordInformasiPribadi,
                    'perusahaan' => $recordPerusahaan,
                    'detail' => $arrDetail,
                    'komponen' => $arrKomponen,
                    'total_rows_pendapatan' => $totalRowsPendapatan,
                    'total_rows_potongan' => $totalRowsPotongan,
                    'section' => $section,
                    'modelRekening' => $modelRekening,
                    'hariKerja' => $hariKerja,
                    'arrLembur' => $arrLembur,
                    'lembur' => $totalBiayaLembur,
                    'sakit' => $sakit,
                    'cuti' => $cuti,
                    'ijin' => $ijin,
                    'alpa' => $alpa,
                    'potonganIjin' => $potonganIjin,
                    'potonganAlpa' => $potonganAlpa,
                    'potonganPulangAwal' => $potonganPulangAwal,
                    'pulangAwal' => $pulangAwal,
                    'totalPendapatan' => $totalPendapatan,
                    'totalPotongan' => $totalPotongan,
                    'thp' => $thpFix
                        ]
        );
    }

    /**
     * 
     * @param int $idPenggajian
     * @param int $idKaryawan
     * @return array
     */
    protected function penggajianKaryawan($idPenggajian, $idKaryawan) {
        $model = $this->findModel($idPenggajian);
        $data = $this->templateDataPenggajian();
        if (count($model) > 0) {
            $pt = (new \app\models\Perusahaan())->find()->select(['nm_pt'])->where(['id' => $model->id_perusahaan])->one();
            if (count($pt) > 0 && $pt !== false) {
                $data['perusahaan'] = $pt['nm_pt'];
            }
            $data['bln_thn'] = $model->bulan . ' ' . $model->tahun;
            $karyawan = (new VKaryawan())->find()->select(['nik', 'tgl_bergabung', 'nama', 'nm_jabatan'])->where(['id_karyawan' => $idKaryawan])->one();
            if (count($karyawan) > 0 && $karyawan !== false) {
                $data['nama'] = $karyawan['nama'];
                $data['nik'] = $karyawan['nik'];
                $data['tgl_bergabung'] = $karyawan['tgl_bergabung'];
                $data['grade_level'] = $karyawan['nm_jabatan'];
            }
            $data['section'] = $this->sectionKaryawan($idKaryawan);
            $rekening = (new \yii\db\Query())->select('no_rek')->from('v_karyawan_rekening')->where(['id_karyawan' => $idKaryawan])->one();
            if (count($rekening) > 0 && $rekening !== false) {
                $data['no_rek'] = $rekening['no_rek'];
            }
            $hariKerja = (new \yii\db\Query())->select('hari_kerja')->from('kalender_kerja')->where(['bulan' => $this->bulanAngka($model->bulan), 'thn' => $model->tahun])->one();
            if (count($hariKerja) > 0 && $hariKerja !== false) {
                $data['hari_kerja'] = (int) $hariKerja['hari_kerja'];
            }
            $pk = (new PenggajianKaryawan())->find()->select(['id_pk'])->where(['id_penggajian' => $idPenggajian, 'id_karyawan' => $idKaryawan])->one();
            if (count($pk) > 0 && $pk !== false) {
                $komponenGaji = $this->komponenPenggajianKaryawan($pk['id_pk']);
                $data['n_upah_pokok'] = (int) $this->komponenGaji($komponenGaji, 2, 'subtotal');
                $data['n_tj_jabatan'] = (int) $this->komponenGaji($komponenGaji, 3, 'subtotal');
                $data['n_tj_transport'] = (int) $this->komponenGaji($komponenGaji, 4, 'subtotal');
                $data['n_tj_shift'] = (int) $this->komponenGaji($komponenGaji, 5, 'subtotal');
                $data['n_bpjs_tenaga_kerja'] = (int) $this->komponenGaji($komponenGaji, 6, 'subtotal');
                $data['n_bpjs_tenaga_kesehatan'] = (int) $this->komponenGaji($komponenGaji, 7, 'subtotal');
            }
            $finger = (new \yii\db\Query())->select('log_finger_id')->from('karyawan_finger_id')->where(['id_karyawan' => $idKaryawan])->one();
            $harian = 0;
            if (count($finger) > 0 && $finger !== false) {
                $dataLembur = $this->hitungLembur($idKaryawan, $finger['log_finger_id'], $model->tgl_awal, $model->tgl_akhir);
                $data['masuk_kerja'] = $dataLembur['totalHari'];
                $data['oth_kerja_9'] = $dataLembur['jam9'];
                $data['oth_kerja_10'] = $dataLembur['jam10'];
                $data['oth_libur_8'] = $dataLembur['jam8Libur'];
                $data['oth_libur_9'] = $dataLembur['jam9Libur'];
                $data['oth_libur_10'] = $dataLembur['jam10Libur'];
                $harian = $FeeLembur = ($data['n_upah_pokok'] + $data['n_tj_jabatan']) / 173;
                $totalLembur = ($data['oth_kerja_9'] * 1.5 * $FeeLembur) + ($data['oth_kerja_10'] * 2 * $FeeLembur) + ($data['oth_libur_8'] * 2 * $FeeLembur) + ($data['oth_libur_9'] * 2 * $FeeLembur) + ($data['oth_libur_10'] * 2 * $FeeLembur);
                $data['n_lembur'] = round($totalLembur);
            }

            $arrAbsensi = $this->getRekapAbsensi($idKaryawan, $model->tgl_awal, $model->tgl_akhir);
            $data['sakit_ijin_khusus'] = $arrAbsensi[2] + $arrAbsensi[7];
            $data['ijin'] = $arrAbsensi[3];
            $data['cuti'] = $arrAbsensi[5];
            $data['alpa'] = $arrAbsensi[4];
            $data['plng_awal_terlambat'] = $arrAbsensi[6] + $arrAbsensi[8];
            $data['n_ijin'] = ($data['ijin'] * 8) * $harian;
            $data['n_alpa'] = ($data['alpa'] * 8) * $harian;
            $data['n_plng_awal_terlambat'] = ($data['plng_awal_terlambat'] * 8) * $harian;
            var_dump($this->nilaiUpahPokok($data['n_upah_pokok'] + $data['n_tj_jabatan'], $data['hari_kerja'], ($data['masuk_kerja'] + $data['sakit_ijin_khusus'] + $data['ijin'] + $data['alpa'])));
            $data['total_penerimaan'] = $this->nilaiUpahPokok($data['n_upah_pokok'] + $data['n_tj_jabatan'], $data['hari_kerja'], ($data['masuk_kerja'] + $data['sakit_ijin_khusus'] + $data['ijin'] + $data['alpa'])) + $data['n_tj_transport'] + $data['n_tj_shift'] + $data['n_lembur'] + $data['n_pajak'] + $data['n_lain_lain'];
            $data['total_potongan'] = $data['n_bpjs_tenaga_kerja'] + $data['n_bpjs_tenaga_kesehatan'] + $data['n_ijin'] + $data['n_alpa'] + $data['n_plng_awal_terlambat'];
            $data['thp'] = $this->pembulatan(round($data['total_penerimaan'] - $data['total_potongan']));
        }
        return $data;
    }

    /**
     * 
     * @param int $upah
     * @param int $hariKerja
     * @param int $masukKerja
     * @return int
     */
    protected function nilaiUpahPokok($upah, $hariKerja, $masukKerja) {
        $value = $upah;
        if ($masukKerja < $hariKerja) {
            $value = $upah - (\round($upah - (($upah / 173 * 8) * $masukKerja)));
        }
        return $value;
    }

    /**
     * 
     * @param array $arrKomponenGaji
     * @param int $key
     * @param string $arrName
     * @return int
     */
    protected function komponenGaji($arrKomponenGaji, $key, $arrName) {
        $value = 0;
        if (array_key_exists($key, $arrKomponenGaji) === true) {
            $value = $arrKomponenGaji[$key][$arrName];
        }
        return $value;
    }

    /**
     * 
     * @return string
     */
    protected function templateDataPenggajian() {
        $template = [
            'perusahaan' => '',
            'bln_thn' => '', 'nama' => '', 'nik' => '', 'tgl_bergabung' => '', 'grade_level' => '', 'section' => '',
            'no_rek' => '', 'hari_kerja' => 0, 'masuk_kerja' => 0,
            'cuti' => '0', 'sakit_ijin_khusus' => '0', 'ijin' => 0, 'alpa' => 0, 'plng_awal_terlambat' => 0,
            'oth_kerja_9' => '0', 'oth_kerja_10' => '0', 'oth_libur_8' => '0', 'oth_libur_9' => '0', 'oth_libur_10' => '0',
            'n_upah_pokok' => 0, 'n_tj_jabatan' => 0, 'n_tj_transport' => 0, 'n_tj_shift' => 0,
            'n_lembur' => 0, 'n_pajak' => 0, 'n_lain_lain' => 0, 'total_penerimaan' => 0,
            'n_bpjs_tenaga_kerja' => 0, 'n_bpjs_kesehatan' => 0, 'n_pph_21' => '0',
            'n_ijin' => 0, 'n_alpa' => 0, 'n_plng_awal_terlambat' => 0, 'total_potongan' => 0,
            'thp' => 0
        ];

        return $template;
    }

    /**
     * 
     * @param type $idKaryawan
     * @return type
     */
    protected function sectionKaryawan($idKaryawan) {
        $section = '';
        $modelSection = (new \yii\db\Query())->select('singkatan, nm_dept')->from('v_karyawan_dept')->where(['id_karyawan' => $idKaryawan])->all();
        if (count($modelSection) > 0) {
            foreach ($modelSection as $rowSection) {
                if ($section !== '') {
                    $section = $section . ', ' . $rowSection['singkatan'];
                } else {
                    $section = $rowSection['singkatan'];
                }
            }
        }
        return $section;
    }

    /**
     * 
     * @param type $idPK
     * @return type
     */
    protected function komponenPenggajianKaryawan($idPK) {
        $data = [];
        $record = (new \yii\db\Query())->select(
                        'penggajian_karyawan_detail.id_komponen AS id_komponen, penggajian_karyawan_detail.jumlah AS jumlah, penggajian_karyawan_detail.nominal AS nominal, penggajian_karyawan_detail.subtotal AS subtotal, komponen_gaji.nm_komponen AS nm_komponen, komponen_gaji.kategori_komponen AS kategori_komponen'
                )->from('penggajian_karyawan_detail')->innerJoin(
                        'komponen_gaji', 'komponen_gaji.id_komponen=penggajian_karyawan_detail.id_komponen'
                )->where(
                        ['id_pk' => $idPK]
                )->all();
        if (count($record) > 0) {
            foreach ($record as $row) {
                $data[$row['id_komponen']] = [
                    'jumlah' => $row['jumlah'],
                    'nominal' => $row['nominal'],
                    'subtotal' => $row['subtotal'],
                    'nm_komponen' => $row['nm_komponen'],
                    'kategori_komponen' => $row['kategori_komponen']
                ];
            }
        }
        return $data;
    }

    /**
     * @param $idKaryawan
     * @param $tglAwal
     * @param $tglAkhir
     * @return array
     */
    protected function getRekapAbsensi($idKaryawan, $tglAwal, $tglAkhir) {
        # 1 = libur
        # 2 = Sakit
        # 3 = Ijin
        # 4 = Alpa
        # 5 = Cuti
        # 6 = Pulang Awal
        # 7 = Ijin Khusus
        # 8 = Terlambat
        $arrAbsensi = [
            '1' => 0, '2' => 0, '3' => 0, '4' => 0, '5' => 0, '6' => 0, '7' => 0, '8' => 0
        ];

        $modelIjinCuti = (new \yii\db\Query())->select('id_tipe_absensi, COUNT(id_karyawan_absensi) AS total')->from('karyawan_absensi')
                        ->where('id_karyawan="' . $idKaryawan . '" AND (tgl_absensi BETWEEN "' . $tglAwal . '" AND "' . $tglAkhir . '")')
                        ->groupBy('id_tipe_absensi')->all();
        if (count($modelIjinCuti) > 0 && $modelIjinCuti !== false) {
            foreach ($modelIjinCuti as $row) {
                if (array_key_exists($row['id_tipe_absensi'], $arrAbsensi) === true) {
                    $arrAbsensi[$row['id_tipe_absensi']] += $row['total'];
                }
            }
        }

        return $arrAbsensi;
    }

    /**
     * @param $angka
     * @return int
     */
    protected function pembulatan($angka) {
        $nilaiBulat = 0;
        $length = strlen($angka);

        if ($length > 3) {
            $nilai = (int) substr($angka, -3);
            if ($nilai !== 500 && $nilai > 500) {
                $angkaRev = substr($angka, 0, ($length - 3)) . '000';
                $nilaiBulat = (int) $angkaRev + $this->pembulatanKecil($nilai);
            } else {
                $angkaRev = substr($angka, 0, ($length - 3)) . '000';
                $nilaiBulat = (int) $angkaRev + $this->pembulatanKecil($nilai);
            }
        }
        return $nilaiBulat;
    }

    /**
     * @param $angka
     * @return int
     */
    protected function pembulatanKecil($angka) {
        $nilai = $angka;
        switch ($angka) {
            case $angka > 100 && $angka < 200:
                $nilai = 200;
                break;
            case $angka > 200 && $angka < 300:
                $nilai = 300;
                break;
            case $angka > 300 && $angka < 400:
                $nilai = 400;
                break;
            case $angka > 400 && $angka < 500:
                $nilai = 500;
                break;
            case $angka > 500 && $angka < 600:
                $nilai = 600;
                break;
            case $angka > 600 && $angka < 700:
                $nilai = 700;
                break;
            case $angka > 700 && $angka < 800:
                $nilai = 800;
                break;
            case $angka > 800 && $angka < 900:
                $nilai = 900;
                break;
            case $angka > 900 && $angka < 1000:
                $nilai = 1000;
                break;
        }
        return $nilai;
    }

    /**
     * @param $bulan
     * @return int
     */
    protected function bulanAngka($bulan) {
        $resultBulan = 1;
        $arrBulan = [
            'Januari' => 1,
            'Februari' => 2,
            'Maret' => 3,
            'April' => 4,
            'Mei' => 5,
            'Juni' => 6,
            'Juli' => 7,
            'Agustus' => 8,
            'September' => 9,
            'Oktober' => 10,
            'November' => 11,
            'Desember' => 12
        ];
        if (array_key_exists($bulan, $arrBulan) === true) {
            $resultBulan = $arrBulan[$bulan];
        }
        return $resultBulan;
    }

    /**
     * Updates an existing Penggajian model.
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
            return $this->render(
                            'update', [
                        'model' => $model,
                            ]
            );
        }
    }

    /**
     * Deletes an existing Penggajian model.
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
    public function actionReportSummary() {
        $summary = [];
        if (count(Yii::$app->request->post()) > 0) {
            $idPT = Yii::$app->request->post('id_perusahaan');
            $bulan = Yii::$app->request->post('bulan');
            $tahun = Yii::$app->request->post('tahun');
            if ($idPT !== '' and $bulan !== '' and $tahun !== '') {
                $modelGaji = new Penggajian();
                $recordGaji = $modelGaji->find()->select('id')->where(
                                ['id_perusahaan' => $idPT, 'bulan' => $bulan, 'tahun' => $tahun]
                        )->all();
                if (count($recordGaji) > 0) {
                    $idGaji = '';
                    foreach ($recordGaji as $rowGaji) {
                        if ($idGaji !== '') {
                            $idGaji .= ', "' . $rowGaji->id . '"';
                        } else {
                            $idGaji = '"' . $rowGaji->id . '"';
                        }
                    }
                    $record = (new \yii\db\Query())->from('v_penggajian_karyawan')->where(
                                    'id_penggajian IN (' . $idGaji . ') '
                            )->all();
                    if (count($record) > 0) {
                        $summary = [];
                        foreach ($record as $row) {
                            if (count($summary) > 0 and array_key_exists($row['nm_jabatan'], $summary) === true) {
                                $summary[$row['nm_jabatan']] += $row['thp'];
                            } else {
                                $summary[$row['nm_jabatan']] = $row['thp'];
                            }
                        }
                    }
                    #$modelGajiDetail = new PenggajianKaryawan();
                    #$record = $modelGajiDetail->find()->where('id_penggajian IN (' . $idGaji . ') ')->all();
                }
            }
        }
        return $this->render('report_summary', ['data' => $summary]);
    }

    /**
     * @return string
     */
    public function actionReportSummaryPdf() {
        $summary = [];
        $recordPT = [];
        $ttd = [];
        $bulan = '';
        $tahun = '';
        if (count(Yii::$app->request->get()) > 0) {
            $idPT = Yii::$app->request->get('id_perusahaan');
            $bulan = Yii::$app->request->get('bulan');
            $tahun = Yii::$app->request->get('tahun');
            if ($idPT !== '' and $bulan !== '' and $tahun !== '') {
                $modelGaji = new Penggajian();
                $recordGaji = $modelGaji->find()->select('id')->where(
                                ['id_perusahaan' => $idPT, 'bulan' => $bulan, 'tahun' => $tahun]
                        )->all();
                if (count($recordGaji) > 0) {
                    $idGaji = '';
                    foreach ($recordGaji as $rowGaji) {
                        if ($idGaji !== '') {
                            $idGaji .= ', "' . $rowGaji->id . '"';
                        } else {
                            $idGaji = '"' . $rowGaji->id . '"';
                        }
                    }
                    $record = (new \yii\db\Query())->from('v_penggajian_karyawan')->where(
                                    'id_penggajian IN (' . $idGaji . ') '
                            )->all();
                    if (count($record) > 0) {
                        $summary = [];
                        foreach ($record as $row) {
                            if (count($summary) > 0 and array_key_exists($row['nm_jabatan'], $summary) === true) {
                                $summary[$row['nm_jabatan']] += $row['thp'];
                            } else {
                                $summary[$row['nm_jabatan']] = $row['thp'];
                            }
                        }
                    }
                    #$modelGajiDetail = new PenggajianKaryawan();
                    #$record = $modelGajiDetail->find()->where('id_penggajian IN (' . $idGaji . ') ')->all();
                }
                switch ($idPT) {
                    case 1:
                        $ttd = [
                            1 => ['user' => 'IMAM SOLICHIN S', 'jabatan' => 'HRD'],
                            2 => ['user' => 'ARIF HIDAYAT, S.Pd, MM', 'jabatan' => 'Ketua STMIK MIC'],
                            3 => ['user' => 'I IBAD ALI TN, SE, MM', 'jabatan' => 'Ketua Yayasan']
                        ];
                        break;
                    case 2:
                        $ttd = [
                            1 => ['user' => 'IMAM SOLICHIN S', 'jabatan' => 'HRD'],
                            2 => ['user' => 'BARYANTO', 'jabatan' => 'Manager'],
                            3 => ['user' => 'I IBAD ALI TN, SE, MM', 'jabatan' => 'Ketua Yayasan']
                        ];
                        break;
                    case 3:
                        $ttd = [
                            1 => ['user' => 'IMAM SOLICHIN S', 'jabatan' => 'HRD'],
                            2 => ['user' => '&nbsp;&nbsp;&nbsp;', 'jabatan' => '&nbsp;&nbsp;&nbsp;'],
                            3 => ['user' => 'I IBAD ALI TN, SE, MM', 'jabatan' => 'Ketua Yayasan']
                        ];
                        break;
                    default:
                        $ttd = [
                            1 => ['user' => 'IMAM SOLICHIN S', 'jabatan' => 'HRD'],
                            2 => ['user' => 'ARIF HIDAYAT, S.Pd, MM', 'jabatan' => 'Ketua STMIK MIC'],
                            3 => ['user' => 'I IBAD ALI TN, SE, MM', 'jabatan' => 'Ketua Yayasan']
                        ];
                }
                $modelPT = new \app\models\Perusahaan();
                $recordPT = $modelPT->findOne(['id' => $idPT]);
            }
        }
        $content = $this->renderPartial(
                'report_summary_pdf', ['data' => $summary, 'pt' => $recordPT, 'ttd' => $ttd, 'bulan' => $bulan, 'tahun' => $tahun]
        );
        $pdf = new Pdf();
        $mpdf = $pdf->api;
        $mpdf->SetHeader(
                'Laporan Summary Penggajian '
        );
        $mpdf->SetFooter('{PAGENO}');
        $mpdf->AddPage(
                'P', // L - landscape, P - portrait
                '', '', '', '', 10, // margin_left
                10, // margin right
                30, // margin top
                10, // margin bottom
                18, // margin header
                12
        );
        $mpdf->WriteHtml($content, 2);
        $mpdf->Output();
    }

    /**
     * Finds the Penggajian model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return Penggajian the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Penggajian::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * 
     * @param type $fingerId
     * @param type $date
     * @return type
     */
    protected function absensiMasuk($fingerId, $date) {
        $data = ['in' => '00:00:00'];
        $modelAbsensiIn = (new \yii\db\Query())->select(['log_date', 'log_time'])->from('log_absensi')
                        ->where('log_finger_id="' . $fingerId . '" AND log_date="' . $date . '" AND log_type="1"')->one();
        if (count($modelAbsensiIn) > 0 && $modelAbsensiIn !== false) {
            $data = ['in' => $modelAbsensiIn['log_time']];
        }

        return $data;
    }

    /**
     * 
     * @param type $fingerId
     * @param type $date
     * @return type
     */
    protected function absensiKeluar($fingerId, $date) {
        $data = ['out' => '00:00:00'];
        $modelAbsensiOut = (new \yii\db\Query())->select(['log_date', 'log_time'])->from('log_absensi')
                        ->where('log_finger_id="' . $fingerId . '" AND log_date="' . $date . '" AND log_type="2"')->one();
        if (count($modelAbsensiOut) > 0 && $modelAbsensiOut !== false) {
            $data = ['out' => $modelAbsensiOut['log_time']];
        }
        return $data;
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
                $arrAbsensi[$date] = array_merge($this->absensiMasuk($fingerId, $date), $this->absensiKeluar($fingerId, $date));
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
                $hour = (int) $timeCompare->format('%h');
                if ($hour > 0) {
                    $hour -= 1;
                    $totalHari++;
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

    public function actionExportExcel() {
        #$model = (new Penggajian())->find()->select(['id', 'tgl', 'bulan'])->all();
        #$model = (new \yii\db\Query())->select(['id', 'tgl', 'bulan'])->from('penggajian')->all();
        $model = [0 => ['id' => '1', 'tgl' => '2', 'bulan' => '3']];
        return $this->render('export_excel', ['model' => $model]);
    }

    public function actionImportExcel() {
        #$path = realpath('import') . PHP_EOL;
        #$path = \yii\helpers\Url::to('@web/import');
        $path = '../web/import';
        $fileName = $path . '/export-2017.xls';
        return $this->render('import_excel', ['fileName' => $fileName]);
    }

}
