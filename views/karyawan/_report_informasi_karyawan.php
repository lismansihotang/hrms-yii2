<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\InformasiPribadi;

/* @var $this yii\web\View */
/** @var $model */
/* @var $idKaryawan */
$this->title = 'Laporan Informasi Karyawan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="absensi-index">
    <h1><?php echo Html::encode($this->title) ?></h1>
    <?php
    $form = ActiveForm::begin([
                'method' => 'post',
                'action' => 'index.php?r=karyawan/report-informasi-karyawan',
                'options' => ['class' => 'form-horizontal']
    ]);
    echo Html::beginTag('label') . 'Pilih Karyawan' . Html::endTag('label');
    echo Select2::widget([
        'name' => 'id_karyawan',
        'id' => 'idKaryawan',
        'value' => $idKaryawan,
        'data' => ArrayHelper::map(InformasiPribadi::find()->all(), 'id_karyawan', 'nama'),
        'options' => ['placeholder' => 'Pilih Nama Karyawan...'],
        'pluginOptions' => ['allowClear' => true],
    ]);
    ?>
    <div class="form-group">
        <?php
        echo Html::submitButton(
                '<span class="glyphicon btn-glyphicon glyphicon-search img-circle text-muted"></span>Check Laporan', ['class' => 'btn icon-btn btn-primary margin-left-15 margin-right-5 margin-top-5']
        );
        echo Html::button(
                '<span class="glyphicon btn-glyphicon glyphicon-print img-circle text-muted"></span>Cetak Laporan', ['class' => 'btn icon-btn btn-success margin-right-5 margin-top-5', 'id' => 'cetak-laporan']
        );
        echo Html::button(
                '<span class="glyphicon btn-glyphicon glyphicon-file img-circle text-muted"></span>Export Excel', ['class' => 'btn icon-btn btn-warning margin-top-5', 'id' => 'export-excel', 'target' => '_blank']
        );
        ?>
    </div>
    <?php
    ActiveForm::end();
    ?>

    <div class="table-responsive">
        <table class="table table-responsive table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Karyawan</th>
                    <th>JK</th>
                    <th>NIK</th>
                    <th>Jabatan</th>
                    <th>Dept</th>
                    <th>DOJ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                if (count($model) > 0) {
                    foreach ($model as $row) {
                        echo Html::beginTag('tr');
                        echo Html::beginTag('td') . $i . Html::endTag('td');
                        echo Html::beginTag('td') . $row['nama'] . Html::endTag('td');
                        echo Html::beginTag('td') . $row['jk'] . Html::endTag('td');
                        echo Html::beginTag('td') . $row['nik'] . Html::endTag('td');
                        echo Html::beginTag('td') . $row['jabatan'] . Html::endTag('td');
                        echo Html::beginTag('td') . $row['dept'] . Html::endTag('td');
                        echo Html::beginTag('td') . $row['doj'] . Html::endTag('td');
                        echo Html::endTag('tr');
                        $i++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php
$url = Url::to(['karyawan/print-report-informasi-karyawan']);
$urlExport = Url::to(['karyawan/export-excel-informasi-karyawan']);
$js = <<<JS
$('#cetak-laporan').click(function(){
    var idKaryawan= $('#idKaryawan').val();
    window.location.href='$url&id_karyawan='+idKaryawan;
    return false;
});
$('#export-excel').click(function(){
    var idKaryawan= $('#idKaryawan').val();
    window.location.href='$urlExport&id_karyawan='+idKaryawan;
    return false;
});
JS;
$this->registerJs($js);
