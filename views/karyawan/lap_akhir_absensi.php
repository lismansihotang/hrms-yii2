<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use app\models\InformasiPribadi;

/* @var $this yii\web\View */
/** @var $model */
/* @var $idKaryawan */
$this->title = 'Laporan Akhir Absensi';
$this->params['breadcrumbs'][] = $this->title;
echo Html::beginTag('div', ['class' => 'absensi-index']);
echo Html::beginTag('h1') . Html::encode($this->title) . Html::endTag('h1');
#echo Html::beginTag('h3').'Periode Harian, Bulanan dan Tahunan'. Html::endTag('h3');
$form = ActiveForm::begin([
            'method' => 'post',
            'action' => 'index.php?r=karyawan/laporan-akhir-absensi',
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
$year = date('Y');
$beforeYear = $year - 3;
$afterYear = $year + 17;
for ($i = $beforeYear; $i <= $afterYear; $i++) {
    $arrThn[$i] = $i;
}

echo Select2::widget([
    'name' => 'thn',
    'id' => 'thn',
    'data' => $arrThn,
    'options' => ['placeholder' => 'Pilih Tahun...'],
    'pluginOptions' => ['allowClear' => true],
]);
echo Html::beginTag('div', ['class' => 'form-group']);
echo Html::submitButton(
        '<span class="glyphicon btn-glyphicon glyphicon-search img-circle text-muted"></span>Check Laporan', ['class' => 'btn icon-btn btn-primary margin-left-15 margin-right-5 margin-top-5']
);
echo Html::button(
        '<span class="glyphicon btn-glyphicon glyphicon-print img-circle text-muted"></span>Cetak Laporan', ['class' => 'btn icon-btn btn-success margin-right-5 margin-top-5', 'id' => 'cetak-laporan']
);
echo Html::button(
        '<span class="glyphicon btn-glyphicon glyphicon-file img-circle text-muted"></span>Export Excel', ['class' => 'btn icon-btn btn-warning margin-top-5', 'id' => 'export-excel', 'target' => '_blank']
);
echo Html::endTag('div');

ActiveForm::end();
echo Html::beginTag('br');
echo Html::beginTag('h1') . $tagTitle . Html::endTag('h1');
echo Html::beginTag('em') . 'Tahun ' . $thn . Html::endTag('em');
echo Html::beginTag('div', ['class' => 'table-responsive']);
echo Html::beginTag('table', ['class' => 'table table-hover table-bordered']);
echo Html::beginTag('thead');
echo Html::beginTag('tr');
echo Html::beginTag('th', ['rowspan' => '2']) . 'No.' . Html::endTag('th');
echo Html::beginTag('th', ['rowspan' => '2']) . 'Nama' . Html::endTag('th');
echo Html::beginTag('th', ['rowspan' => '2']) . 'Nik' . Html::endTag('th');
echo Html::beginTag('th', ['rowspan' => '2']) . 'Dept/DOJ' . Html::endTag('th');
echo Html::beginTag('th', ['rowspan' => '2', 'class' => 'text-center']) . 'KERJA' . Html::endTag('th');
echo Html::beginTag('th', ['rowspan' => '2', 'class' => 'text-center']) . 'OVERTIME' . Html::endTag('th');
echo Html::beginTag('th', ['colspan' => '2', 'class' => 'text-center']) . 'CUTI' . Html::endTag('th');
echo Html::beginTag('th', ['colspan' => '10', 'class' => 'text-center']) . 'TIDAK MASUK KERJA' . Html::endTag('th');
echo Html::endTag('tr');
echo Html::beginTag('tr');
echo Html::beginTag('th') . 'PAKAI' . Html::endTag('th');
echo Html::beginTag('th') . 'SISA' . Html::endTag('th');
echo Html::beginTag('th', ['colspan' => '2']) . 'SAKIT & DAN KHUSUS' . Html::endTag('th');
echo Html::beginTag('th', ['colspan' => '2']) . 'IJIN' . Html::endTag('th');
echo Html::beginTag('th', ['colspan' => '2']) . 'ALPA' . Html::endTag('th');
echo Html::beginTag('th', ['colspan' => '2']) . 'PULANG AWAL' . Html::endTag('th');
echo Html::beginTag('th', ['colspan' => '2']) . 'TERLAMBAT' . Html::endTag('th');
echo Html::endTag('tr');
echo Html::endTag('thead');
echo Html::beginTag('tbody');
if (count($model) > 0) {
    $i = 1;
    foreach ($model as $id => $row) {
        echo Html::beginTag('tr');
        echo Html::beginTag('td') . $i . Html::endTag('td');
        echo Html::beginTag('td') . $arrKaryawan[$id]['nama'] . Html::endTag('td');
        echo Html::beginTag('td') . $arrKaryawan[$id]['nik'] . Html::endTag('td');
        echo Html::beginTag('td') . $arrKaryawan[$id]['doj'] . Html::endTag('td');
        echo Html::beginTag('td', ['class' => 'text-center']) . round(($modelKerja[$id]['kerja'] / $modelKerja[$id]['totalTahun']), 2) . ' %' . Html::endTag('td');
        echo Html::beginTag('td', ['class' => 'text-center']) . $modelOT[$id] . Html::endTag('td');
        #var_dump($row);
        if (array_key_exists(5, $row) === true) {
            echo Html::beginTag('td', ['class' => 'text-center']) . $row[5] . Html::endTag('td');
            echo Html::beginTag('td', ['class' => 'text-center']) . ($quotaCuti - $row[5]) . Html::endTag('td');
        } else {
            echo Html::beginTag('td', ['class' => 'text-center']) . '0' . Html::endTag('td');
            echo Html::beginTag('td', ['class' => 'text-center']) . '0' . Html::endTag('td');
        }
        if (array_key_exists(2, $row) === true) {
            if (array_key_exists(7, $row) === true) {
                echo Html::beginTag('td', ['class' => 'text-center']) . ($row[2] + $row[7]) . Html::endTag('td');
            } else {
                echo Html::beginTag('td', ['class' => 'text-center']) . $row[2] . Html::endTag('td');
            }
        } else {
            echo Html::beginTag('td', ['class' => 'text-center']) . '0' . Html::endTag('td');
        }
        echo Html::beginTag('td', ['class' => 'text-center']) . '0' . Html::endTag('td');
        if (array_key_exists(3, $row) === true) {
            echo Html::beginTag('td', ['class' => 'text-center']) . $row[3] . Html::endTag('td');
        } else {
            echo Html::beginTag('td', ['class' => 'text-center']) . '0' . Html::endTag('td');
        }

        echo Html::beginTag('td', ['class' => 'text-center']) . Html::endTag('td');
        if (array_key_exists(4, $row) === true) {
            echo Html::beginTag('td', ['class' => 'text-center']) . $row[4] . Html::endTag('td');
        } else {
            echo Html::beginTag('td', ['class' => 'text-center']) . '0' . Html::endTag('td');
        }
        echo Html::beginTag('td', ['class' => 'text-center']) . '0' . Html::endTag('td');
        echo Html::beginTag('td', ['class' => 'text-center']) . $modelPAT[$id]['terlambat'] . Html::endTag('td');
        echo Html::beginTag('td', ['class' => 'text-center']) . $modelPAT[$id]['totalTerlambat'] . Html::endTag('td');
        echo Html::beginTag('td', ['class' => 'text-center']) . $modelPAT[$id]['pulangAwal'] . Html::endTag('td');
        echo Html::beginTag('td', ['class' => 'text-center']) . $modelPAT[$id]['totalPulangAwal'] . Html::endTag('td');

        echo Html::endTag('tr');
        $i++;
    }
}
echo Html::endTag('tbody');
echo Html::endTag('table');
echo Html::endTag('div');
echo Html::endTag('div');
$url = Url::to(['karyawan/print-laporan-akhir-absensi']);
$urlExport = Url::to(['karyawan/export-excel-informasi-karyawan']);
$js = <<<JS
$('#cetak-laporan').click(function(){
    var idKaryawan= $('#idKaryawan').val();
    var thn=$('#thn').val(); 
    window.location.href='$url&id_karyawan='+idKaryawan+'&thn='+thn;
    return false;
});
$('#export-excel').click(function(){
    var idKaryawan= $('#idKaryawan').val();
    window.location.href='$urlExport&id_karyawan='+idKaryawan;
    return false;
});
JS;
$this->registerJs($js);
