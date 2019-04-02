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
$this->title = 'Laporan Rekapitulasi Kehadiran Karyawan';
$this->params['breadcrumbs'][] = $this->title;

echo Html::beginTag('div', ['class' => 'absensi-index']);
echo Html::beginTag('h1') . Html::encode($this->title) . Html::endTag('h1');
$form = ActiveForm::begin([
            'method' => 'post',
            'action' => 'index.php?r=karyawan/laporan-rekapitulasi-kehadiran-karyawan',
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
echo Html::beginTag('th', ['colspan' => '2', 'class' => 'text-center']) . '1' . Html::endTag('th');
echo Html::beginTag('th', ['colspan' => '2', 'class' => 'text-center']) . '2' . Html::endTag('th');
echo Html::beginTag('th', ['colspan' => '2', 'class' => 'text-center']) . '3' . Html::endTag('th');
echo Html::beginTag('th', ['colspan' => '2', 'class' => 'text-center']) . '4' . Html::endTag('th');
echo Html::beginTag('th', ['colspan' => '2', 'class' => 'text-center']) . '5' . Html::endTag('th');
echo Html::beginTag('th', ['colspan' => '2', 'class' => 'text-center']) . '6' . Html::endTag('th');
echo Html::beginTag('th', ['colspan' => '2', 'class' => 'text-center']) . '7' . Html::endTag('th');
echo Html::beginTag('th', ['colspan' => '2', 'class' => 'text-center']) . '8' . Html::endTag('th');
echo Html::beginTag('th', ['colspan' => '2', 'class' => 'text-center']) . '9' . Html::endTag('th');
echo Html::beginTag('th', ['colspan' => '2', 'class' => 'text-center']) . '10' . Html::endTag('th');
echo Html::beginTag('th', ['colspan' => '2', 'class' => 'text-center']) . '11' . Html::endTag('th');
echo Html::beginTag('th', ['colspan' => '2', 'class' => 'text-center']) . '12' . Html::endTag('th');
echo Html::beginTag('th', ['colspan' => '2']) . 'TOTAL' . Html::endTag('th');
echo Html::endTag('tr');
echo Html::beginTag('tr');
$totalMasukTahunan = 0;
for ($x = 1; $x < 13; $x++) {
    if (count($arrKalenderKerja) > 0) {
        if (array_key_exists($x, $arrKalenderKerja) === true) {
            echo Html::beginTag('th', ['colspan' => '2', 'class' => 'text-center']) . $arrKalenderKerja[$x] . Html::endTag('th');
            $totalMasukTahunan += $arrKalenderKerja[$x];
        } else {
            echo Html::beginTag('th', ['colspan' => '2', 'class' => 'text-center']) . $x . Html::endTag('th');
        }
    } else {
        echo Html::beginTag('th', ['colspan' => '2', 'class' => 'text-center']) . $x . Html::endTag('th');
    }
}
echo Html::beginTag('th', ['colspan' => '2', 'class' => 'text-center']) . $totalMasukTahunan . Html::endTag('th');
echo Html::endTag('tr');
echo Html::endTag('thead');
echo Html::beginTag('tbody');
$i = 1;
$grandTotal = 0;
$grandTotalHadir = 0;
$grandTotalMasukLibur = 0;
$hadir = [
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
$masukLibur = [
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
$calcHadir = 0;
$calcMasukLibur = 0;
if (count($model) > 0) {
    foreach ($model as $id => $row) {
        echo Html::beginTag('tr');
        echo Html::beginTag('td') . $i . Html::endTag('td');
        echo Html::beginTag('td') . $arrKaryawan[$id]['nama'] . Html::endTag('td');
        echo Html::beginTag('td') . $arrKaryawan[$id]['nik'] . Html::endTag('td');
        echo Html::beginTag('td') . $arrKaryawan[$id]['doj'] . Html::endTag('td');
        $totalHadir = 0;
        $totalMasukLibur = 0;
        for ($month = 1; $month < 13; $month++) {
            echo Html::beginTag('td', ['class' => 'text-center']) . $row[$month]['hadir'] . Html::endTag('td');
            echo Html::beginTag('td', ['class' => 'text-center']) . $row[$month]['masukLibur'] . Html::endTag('td');
            $totalHadir += $row[$month]['hadir'];
            $totalMasukLibur += $row[$month]['masukLibur'];
            $hadir[$month] += $row[$month]['hadir'];
            $masukLibur[$month] += $row[$month]['masukLibur'];
            $grandTotalHadir += $totalHadir;
            $grandTotalMasukLibur += $totalMasukLibur;
        }

        if ($totalHadir > 0) {
            echo Html::beginTag('td') . round(($totalHadir / $totalMasukTahunan), 2) . ' %' . Html::endTag('td');
            echo Html::beginTag('td') . round(($totalMasukLibur / $totalMasukTahunan), 2) . ' %' . Html::endTag('td');
        } else {
            echo Html::beginTag('td') . '0 %' . Html::endTag('td');
            echo Html::beginTag('td') . '0 %' . Html::endTag('td');
        }

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
    echo Html::beginTag('td', ['class' => 'text-center']) . '<strong>' . $hadir[$x] . '</strong>' . Html::endTag('td');
    echo Html::beginTag('td', ['class' => 'text-center']) . '<strong>' . $masukLibur[$x] . '</strong>' . Html::endTag('td');
}
#print_r($hadir);
if ($grandTotalHadir > 0) {
    $calcHadir = round(($grandTotalHadir / $totalMasukTahunan), 2) . ' %';
    $calcMasukLibur = round(($grandTotalMasukLibur / $totalMasukTahunan), 2) . ' %';
}
echo Html::beginTag('td', ['class' => 'text-center']) . '<strong>' . $calcHadir . '</strong>' . Html::endTag('td');
echo Html::beginTag('td', ['class' => 'text-center']) . '<strong>' . $calcMasukLibur . '</strong>' . Html::endTag('td');
echo Html::endTag('tr');
echo Html::endTag('tbody');
echo Html::endTag('table');
echo Html::endTag('div');
#echo '<pre>';
#print_r($model);
#echo '</pre>';
echo Html::endTag('div');
$url = Url::to(['karyawan/print-laporan-rekap-kehadiran-karyawan']);
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
