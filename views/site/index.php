<?php
use kartik\icons\Icon;
use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'ePayroll';
Icon::map($this);
?>
<div class="site-index">

    <div class="body-content">
        <div class="row margin-top-35">
            <div class="col-md-2 margin-top-10">
                <a class="btn btn-primary btn-index" href="<?php echo Url::toRoute('karyawan/index'); ?>">
                    <?php echo Icon::show('user', ['class' => 'fa-3x fa-border'], Icon::FA); ?>
                    <br>
                    Karyawan
                    <h3><?php echo $countKaryawan; ?> Karyawan
                    </h3>
                </a>
            </div>
            <div class="col-md-2 margin-top-10">
                <a class="btn btn-primary btn-index"
                   href="<?php echo Url::toRoute(['karyawan/list-karyawan', 'status' => 'magang']); ?>">
                    <?php echo Icon::show('user', ['class' => 'fa-3x fa-border'], Icon::FA); ?>
                    <br>
                    Karyawan Magang
                    <h3><?php echo $countMagang; ?> Karyawan
                    </h3>
                </a>
            </div>
            <div class="col-md-2 margin-top-10">
                <a class="btn btn-primary btn-index"
                   href="<?php echo Url::toRoute(['karyawan/list-karyawan', 'status' => 'pkl']); ?>">
                    <?php echo Icon::show('user', ['class' => 'fa-3x fa-border'], Icon::FA); ?>
                    <br>
                    PKL
                    <h3><?php echo $countPKL; ?> Karyawan
                    </h3>
                </a>
            </div>
            <div class="col-md-2 margin-top-10">
                <a class="btn btn-primary btn-index"
                   href="<?php echo Url::toRoute(['karyawan/list-karyawan', 'status' => 'non-karyawan']); ?>">
                    <?php echo Icon::show('user', ['class' => 'fa-3x fa-border'], Icon::FA); ?>
                    <br>
                    Non Karyawan
                    <h3><?php echo $countNonKaryawan; ?> Karyawan
                    </h3>
                </a>
            </div>
            <div class="col-md-2 margin-top-10">
                <a class="btn btn-primary btn-index"
                   href="<?php echo Url::toRoute(['karyawan/list-karyawan', 'status' => 'non-aktif']); ?>">
                    <?php echo Icon::show('user', ['class' => 'fa-3x fa-border'], Icon::FA); ?>
                    <br>
                    Non Aktif
                    <h3><?php echo $countNonAktif; ?> Karyawan
                    </h3>
                </a>
            </div>
            <div class="col-md-2 margin-top-10">
                <a class="btn btn-primary btn-index" href="<?php echo Url::toRoute('log-absensi/index'); ?>">
                    <?php echo Icon::show('calendar-check-o', ['class' => 'fa-3x fa-border'], Icon::FA); ?>
                    <br>
                    Absensi
                    <h3><?php echo $countLogAbsensi; ?> Record
                    </h3>
                </a>
            </div>
            <div class="col-md-2 margin-top-10">
                <a class="btn btn-primary btn-index" href="<?php echo Url::toRoute('absensi/index'); ?>">
                    <?php echo Icon::show('paper-plane', ['class' => 'fa-3x fa-border'], Icon::FA); ?>
                    <br>
                    Cuti
                    <h3><?php echo $countAbsensiCuti; ?> Karyawan
                    </h3>
                </a>
            </div>
            <div class="col-md-2 margin-top-10">
                <a class="btn btn-primary btn-index" href="<?php echo Url::toRoute('penggajian/index'); ?>">
                    <?php echo Icon::show('money', ['class' => 'fa-3x fa-border'], Icon::FA); ?>
                    <br>
                    Penggajian
                    <h3><?php echo $countPenggajian; ?> Record
                    </h3>
                </a>
            </div>
            <div class="col-md-2 margin-top-10">
                <a class="btn btn-primary btn-index" href="<?php echo Url::toRoute('penggajian/report-summary'); ?>">
                    <?php echo Icon::show('file-powerpoint-o', ['class' => 'fa-3x fa-border'], Icon::FA); ?>
                    <br>
                    Laporan
                    <h3><?php echo $countPenggajian; ?> Record
                    </h3>
                </a>
            </div>
        </div>
    </div>
</div>
<style>
    .btn-index {
        min-width: 180px !important;
    }
</style>
