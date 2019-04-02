<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

raoul2000\bootswatch\BootswatchAsset::$theme = 'cerulean';
AppAsset::register($this);
$this->beginPage();
?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">
    <head>
        <meta charset="<?php echo Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/ico" href="<?php echo yii\helpers\Url::to('@web') . '/favicon.ico'; ?>"/>
        <?php echo Html::csrfMetaTags() ?>
        <title><?php echo Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin(
                    [
                        'brandLabel' => Html::img('@web/images/pratama-logo-180.png', ['class' => 'img img-responsive', 'id' => 'img-main-logo']) . ' &nbsp;&nbsp;HR - Pratama',
                        'brandUrl' => Yii::$app->homeUrl,
                        'options' => [
                            'class' => 'navbar-default navbar-fixed-top',
                        ],
                    ]
            );
            echo Nav::widget(
                    [
                        'encodeLabels' => false,
                        'options' => ['class' => 'navbar-nav navbar-right'],
                        'items' => [
                            ['label' => '<span class="glyphicon glyphicon-home"> </span> Home', 'url' => ['/site/index']],
                            [
                                'label' => '<span class="glyphicon glyphicon-dashboard"> </span> Kegiatan',
                                'items' => [
                                    #['label' => 'absensi', 'url' => ['absensi/index']],
                                    #['label' => 'Cuti', 'url' => ['cuti/index']],
                                    #['label' => 'Pengaturan Shift', 'url' => ['shift/index']],
                                    ['label' => 'Penggajian', 'url' => ['penggajian/index']],
                                    '<li class="divider"></li>',
                                    ['label' => 'Absensi', 'url' => ['log-absensi/index']],
                                    ['label' => 'Detail Absensi', 'url' => ['karyawan-absensi/index']],
                                    ['label' => 'Import Absensi', 'url' => ['log-absensi/import-absensi']],
                                    '<li class="divider"></li>',
                                    ['label' => 'Kalender Kerja', 'url' => ['kalender-kerja/index']],
                                    ['label' => 'Kalender Libur', 'url' => ['kalender-libur/index']],
                                ],
                            ],
                            [
                                'label' => '<span class="glyphicon glyphicon-th"> </span> Laporan',
                                'items' => [
                                    #['label' => 'Rekapitulasi Gaji', 'url' => ['penggajian/report-summary']],
                                    ['label' => 'Laporan Absensi Karyawan', 'url' => ['karyawan/report-absensi']],
                                    ['label' => 'Laporan Rekap Absensi', 'url' => ['karyawan/report-rekap-absensi']],
                                    ['label' => 'Laporan Informasi Karyawan', 'url' => ['karyawan/report-informasi-karyawan']],
                                    '<li class="divider"></li>',
                                    ['label' => 'Laporan Rekap Absensi', 'url' => ['karyawan/laporan-rekap-absensi']],
                                    ['label' => 'Laporan Rekap Absensi (Tipe Absensi)', 'url' => ['karyawan/laporan-rekap-tipe-absensi']],
                                    ['label' => 'Laporan Akhir Absensi', 'url' => ['karyawan/laporan-akhir-absensi']],
                                    ['label' => 'Laporan Rekapitulasi Kehadiran Karyawan', 'url' => ['karyawan/laporan-rekapitulasi-kehadiran-karyawan']],
                                ]
                            ],
                            [
                                'label' => '<span class="glyphicon glyphicon-wrench"> </span> Master Data',
                                'items' => [
                                    ['label' => 'Perusahaan', 'url' => ['perusahaan/index']],
                                    ['label' => 'Departemen', 'url' => ['departemen/index']],
                                    ['label' => 'Jabatan', 'url' => ['jabatan/index']],
                                    '<li class="divider"></li>',
                                    ['label' => 'Karyawan', 'url' => ['karyawan/index']],
                                    ['label' => 'Atasan Karyawan', 'url' => ['karyawan-atasan/index']],
                                    ['label' => 'Data Pribadi Karyawan', 'url' => ['informasi-pribadi/index']],
                                    ['label' => 'Data Finger Karyawan', 'url' => ['karyawan-finger-id/index']],
                                    ['label' => 'Komponen Gaji Karyawan', 'url' => ['komponen-gaji-karyawan/index']],
                                    ['label' => 'Data Riwayat Pendidikan', 'url' => ['riwayat-pendidikan/index']],
                                    '<li class="divider"></li>',
                                    ['label' => 'Komponen Gaji', 'url' => ['komponen-gaji/index']],
                                    ['label' => 'Tipe Absensi', 'url' => ['tipe-absensi/index']],
                                    ['label' => 'Tipe Cuti', 'url' => ['tipe-cuti/index']],
                                    ['label' => 'Tipe Shift', 'url' => ['tipe-shift/index']],
                                    '<li class="divider"></li>',
                                    ['label' => 'Data Pendidikan', 'url' => ['pendidikan/index']],
                                    ['label' => 'Tempat Pendidikan', 'url' => ['tempat-pendidikan/index']],
                                    '<li class="divider"></li>',
                                    ['label' => 'Quota Cuti', 'url' => ['quota-cuti/index']],
                                    ['label' => 'Toleransi Absensi', 'url' => ['toleransi-absensi/index']],
                                ],
                            ],
                            [
                                'label' => '<span class="glyphicon glyphicon-wrench"> </span> Setting',
                                'items' => [
                                    ['label' => 'Hubungan Keluarga', 'url' => ['hubungan-keluarga/index']],
                                    ['label' => 'Pekerjaan', 'url' => ['pekerjaan/index']],
                                    ['label' => 'Penghasilan', 'url' => ['penghasilan/index']],
                                    ['label' => 'Barang Inventaris', 'url' => ['barang-inventaris/index']],
                                    ['label' => 'Jenis Identitas', 'url' => ['jenis-identitas/index']],
                                    ['label' => 'Status Karyawan', 'url' => ['status/index']],
                                    ['label' => 'Jenis Sanksi', 'url' => ['jenis-sanksi/index']],
                                    ['label' => 'Bank', 'url' => ['bank/index']],
                                    ['label' => 'Data Pengguna', 'url' => ['sys-user/index']],
                                ]
                            ],
                            Yii::$app->user->isGuest ? (
                                    ['label' => '<span class="glyphicon glyphicon-log-in"> </span> Login', 'url' => ['/site/login']]
                                    ) : (
                                    '<li>'
                                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                                    . Html::submitButton(
                                            'Logout (' . Yii::$app->user->identity->user_name . ')', ['class' => 'btn btn-link']
                                    )
                                    . Html::endForm()
                                    . '</li>'
                                    )
                        ],
                    ]
            );
            NavBar::end();
            echo Html::beginTag('div', ['class' => 'container']);
            echo Breadcrumbs::widget(
                    [
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]
            );
            echo $content;
            echo Html::endTag('div');
            ?>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; HR - Pratama <?php echo date('Y'); ?></p>

                <p class="pull-right"><?php echo Yii::powered() ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
