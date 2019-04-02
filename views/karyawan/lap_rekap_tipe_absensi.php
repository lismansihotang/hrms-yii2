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
$this->title = 'Laporan Rekapitulasi Absensi';
$this->params['breadcrumbs'][] = $this->title;

echo Html::beginTag('div', ['class' => 'absensi-index']);
echo Html::beginTag('h1') . Html::encode($this->title) . Html::endTag('h1');
echo Html::beginTag('h3') . 'Cuti, Overtime' . Html::endTag('h3');
$form = ActiveForm::begin([
            'method' => 'post',
            'action' => 'index.php?r=karyawan/laporan-rekap-tipe-absensi',
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
#OVERTIME
echo Html::beginTag('h2') . 'OVERTIME' . Html::endTag('h2');
echo Html::beginTag('div', ['class' => 'table-responsive']);
echo Html::beginTag('table', ['class' => 'table table-hover table-bordered']);
echo Html::beginTag('thead');
echo Html::beginTag('tr');
echo Html::beginTag('th', ['rowspan' => '2']) . 'No.' . Html::endTag('th');
echo Html::beginTag('th', ['rowspan' => '2']) . 'Nama' . Html::endTag('th');
echo Html::beginTag('th', ['rowspan' => '2']) . 'Nik' . Html::endTag('th');
echo Html::beginTag('th', ['rowspan' => '2']) . 'Dept/DOJ' . Html::endTag('th');
echo Html::beginTag('th', ['colspan' => '12', 'class' => 'text-center']) . 'OVERTIME' . Html::endTag('th');
echo Html::beginTag('th', ['rowspan' => '2', 'class' => 'text-center']) . 'Total' . Html::endTag('th');
echo Html::endTag('tr');
echo Html::beginTag('tr');

echo Html::beginTag('th', ['class' => 'text-center']) . '1' . Html::endTag('th');
echo Html::beginTag('th', ['class' => 'text-center']) . '2' . Html::endTag('th');
echo Html::beginTag('th', ['class' => 'text-center']) . '3' . Html::endTag('th');
echo Html::beginTag('th', ['class' => 'text-center']) . '4' . Html::endTag('th');
echo Html::beginTag('th', ['class' => 'text-center']) . '5' . Html::endTag('th');
echo Html::beginTag('th', ['class' => 'text-center']) . '6' . Html::endTag('th');
echo Html::beginTag('th', ['class' => 'text-center']) . '7' . Html::endTag('th');
echo Html::beginTag('th', ['class' => 'text-center']) . '8' . Html::endTag('th');
echo Html::beginTag('th', ['class' => 'text-center']) . '9' . Html::endTag('th');
echo Html::beginTag('th', ['class' => 'text-center']) . '10' . Html::endTag('th');
echo Html::beginTag('th', ['class' => 'text-center']) . '11' . Html::endTag('th');
echo Html::beginTag('th', ['class' => 'text-center']) . '12' . Html::endTag('th');
echo Html::endTag('tr');
echo Html::endTag('thead');
echo Html::beginTag('tbody');
$i = 1;
$grandTotal = 0;
$sub = [
    '1' => 0,
    '2' => 0,
    '3' => 0,
    '4' => 0,
    '5' => 0,
    '6' => 0,
    '7' => 0,
    '8' => 0,
    '9' => 0,
    '10' => 0,
    '11' => 0,
    '12' => 0
];
if (count($modelCuti) > 0) {

    foreach ($modelOT as $idOT => $rowOT) {
        $totalOT = 0;
        echo Html::beginTag('tr');
        echo Html::beginTag('td') . $i . Html::endTag('td');
        echo Html::beginTag('td') . $arrKaryawan[$idOT]['nama'] . Html::endTag('td');
        echo Html::beginTag('td') . $arrKaryawan[$idOT]['nik'] . Html::endTag('td');
        echo Html::beginTag('td') . $arrKaryawan[$idOT]['doj'] . Html::endTag('td');
        for ($month = 1; $month < 13; $month++) {
            echo Html::beginTag('td', ['class' => 'text-center']) . $rowOT[$month] . Html::endTag('td');
            $totalOT += $rowOT[$month];
            $sub[$month] += $rowOT[$month];
        }
        $grandTotal += $totalOT;
        echo Html::beginTag('td', ['class' => 'text-center']) . number_format($totalOT) . Html::endTag('td');
        echo Html::endTag('tr');
        $i++;
    }
}
echo Html::beginTag('tr');
echo Html::beginTag('td') . Html::endTag('td');
echo Html::beginTag('td') . 'TOTAL' . Html::endTag('td');
echo Html::beginTag('td') . Html::endTag('td');
echo Html::beginTag('td') . Html::endTag('td');
for ($x = 1; $x < 13; $x++) {
    echo Html::beginTag('td', ['class' => 'text-center']) . '<strong>' . $sub[$x] . '</strong>' . Html::endTag('td');
}
echo Html::beginTag('td', ['class' => 'text-center']) . '<strong>' . $grandTotal . '</strong>' . Html::endTag('td');
echo Html::endTag('tr');
echo Html::endTag('tbody');
echo Html::endTag('table');
echo Html::endTag('div');
echo Html::beginTag('hr');

#CUTI
echo Html::beginTag('h2') . 'CUTI' . Html::endTag('h2');
echo Html::beginTag('div', ['class' => 'table-responsive']);
echo Html::beginTag('table', ['class' => 'table table-hover table-bordered']);
echo Html::beginTag('thead');
echo Html::beginTag('tr');
echo Html::beginTag('th', ['rowspan' => '2']) . 'No.' . Html::endTag('th');
echo Html::beginTag('th', ['rowspan' => '2']) . 'Nama' . Html::endTag('th');
echo Html::beginTag('th', ['rowspan' => '2']) . 'Nik' . Html::endTag('th');
echo Html::beginTag('th', ['rowspan' => '2']) . 'Dept/DOJ' . Html::endTag('th');
echo Html::beginTag('th', ['colspan' => '12', 'class' => 'text-center']) . 'CUTI' . Html::endTag('th');
echo Html::beginTag('th', ['rowspan' => '2', 'class' => 'text-center']) . 'Cuti ' . $thn . Html::endTag('th');
echo Html::beginTag('th', ['rowspan' => '2', 'class' => 'text-center']) . 'Sisa ' . Html::endTag('th');
echo Html::endTag('tr');
echo Html::beginTag('tr');

echo Html::beginTag('th', ['class' => 'text-center']) . '1' . Html::endTag('th');
echo Html::beginTag('th', ['class' => 'text-center']) . '2' . Html::endTag('th');
echo Html::beginTag('th', ['class' => 'text-center']) . '3' . Html::endTag('th');
echo Html::beginTag('th', ['class' => 'text-center']) . '4' . Html::endTag('th');
echo Html::beginTag('th', ['class' => 'text-center']) . '5' . Html::endTag('th');
echo Html::beginTag('th', ['class' => 'text-center']) . '6' . Html::endTag('th');
echo Html::beginTag('th', ['class' => 'text-center']) . '7' . Html::endTag('th');
echo Html::beginTag('th', ['class' => 'text-center']) . '8' . Html::endTag('th');
echo Html::beginTag('th', ['class' => 'text-center']) . '9' . Html::endTag('th');
echo Html::beginTag('th', ['class' => 'text-center']) . '10' . Html::endTag('th');
echo Html::beginTag('th', ['class' => 'text-center']) . '11' . Html::endTag('th');
echo Html::beginTag('th', ['class' => 'text-center']) . '12' . Html::endTag('th');
echo Html::endTag('tr');
echo Html::endTag('thead');
echo Html::beginTag('tbody');
$i = 1;
$cutiTahunan = 0;
$grandTotal = 0;
$sub = [
    '1' => 0,
    '2' => 0,
    '3' => 0,
    '4' => 0,
    '5' => 0,
    '6' => 0,
    '7' => 0,
    '8' => 0,
    '9' => 0,
    '10' => 0,
    '11' => 0,
    '12' => 0
];
if (count($modelCuti) > 0) {
    foreach ($modelCuti as $idCuti => $rowCuti) {
        $sisaCuti = $quotaCuti;
        echo Html::beginTag('tr');
        echo Html::beginTag('td') . $i . Html::endTag('td');
        echo Html::beginTag('td') . $arrKaryawan[$idCuti]['nama'] . Html::endTag('td');
        echo Html::beginTag('td') . $arrKaryawan[$idCuti]['nik'] . Html::endTag('td');
        echo Html::beginTag('td') . $arrKaryawan[$idCuti]['doj'] . Html::endTag('td');
        for ($month = 1; $month < 13; $month++) {
            echo Html::beginTag('td', ['class' => 'text-center']) . $rowCuti[$month] . Html::endTag('td');
            $sisaCuti -= $rowCuti[$month];
            $sub[$month] += $rowCuti[$month];
        }
        $cutiTahunan += $quotaCuti;
        $grandTotal += $sisaCuti;
        echo Html::beginTag('td', ['class' => 'text-center']) . $quotaCuti . Html::endTag('td');
        echo Html::beginTag('td', ['class' => 'text-center']) . $sisaCuti . Html::endTag('td');
        echo Html::endTag('tr');
        $i++;
    }
}
echo Html::beginTag('tr');
echo Html::beginTag('td') . Html::endTag('td');
echo Html::beginTag('td') . 'TOTAL' . Html::endTag('td');
echo Html::beginTag('td') . Html::endTag('td');
echo Html::beginTag('td') . Html::endTag('td');
for ($x = 1; $x < 13; $x++) {
    echo Html::beginTag('td', ['class' => 'text-center']) . '<strong>' . $sub[$x] . '</strong>' . Html::endTag('td');
}
echo Html::beginTag('td', ['class' => 'text-center']) . '<strong>' . $cutiTahunan . '</strong>' . Html::endTag('td');
echo Html::beginTag('td', ['class' => 'text-center']) . '<strong>' . $grandTotal . '</strong>' . Html::endTag('td');
echo Html::endTag('tr');
echo Html::endTag('tbody');
echo Html::endTag('table');
echo Html::endTag('div');

echo Html::endTag('div');
$url = Url::to(['karyawan/print-laporan-rekap-tipe-absensi']);
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
