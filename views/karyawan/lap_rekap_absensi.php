<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\VKaryawan;

/* @var $this yii\web\View */
/** @var $model */
/* @var $idKaryawan */
$this->title = 'Laporan Rekapitulasi Absensi';
$this->params['breadcrumbs'][] = $this->title;

echo Html::beginTag('div', ['class' => 'absensi-index']);
echo Html::beginTag('h1') . Html::encode($this->title) . Html::endTag('h1');
echo Html::beginTag('h3') . 'Pulang Awal & Terlambat' . Html::endTag('h3');
$form = ActiveForm::begin([
            'method' => 'post',
            'action' => 'index.php?r=karyawan/laporan-rekap-absensi',
            'options' => ['class' => 'form-horizontal']
        ]);
echo Html::beginTag('label') . 'Pilih Karyawan' . Html::endTag('label');
echo Select2::widget([
    'name' => 'id_karyawan',
    'id' => 'idKaryawan',
    'value' => $idKaryawan,
    'data' => ArrayHelper::map(VKaryawan::find()->where('id_status IN ("1","2","3","4","8","9")')->all(), 'id_karyawan', 'nama'),
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
echo Html::beginTag('th', ['colspan' => '3', 'class' => 'text-center']) . '1' . Html::endTag('th');
echo Html::beginTag('th', ['colspan' => '3', 'class' => 'text-center']) . '2' . Html::endTag('th');
echo Html::beginTag('th', ['colspan' => '3', 'class' => 'text-center']) . '3' . Html::endTag('th');
echo Html::beginTag('th', ['colspan' => '3', 'class' => 'text-center']) . '4' . Html::endTag('th');
echo Html::beginTag('th', ['colspan' => '3', 'class' => 'text-center']) . '5' . Html::endTag('th');
echo Html::beginTag('th', ['colspan' => '3', 'class' => 'text-center']) . '6' . Html::endTag('th');
echo Html::beginTag('th', ['colspan' => '3', 'class' => 'text-center']) . '7' . Html::endTag('th');
echo Html::beginTag('th', ['colspan' => '3', 'class' => 'text-center']) . '8' . Html::endTag('th');
echo Html::beginTag('th', ['colspan' => '3', 'class' => 'text-center']) . '9' . Html::endTag('th');
echo Html::beginTag('th', ['colspan' => '3', 'class' => 'text-center']) . '10' . Html::endTag('th');
echo Html::beginTag('th', ['colspan' => '3', 'class' => 'text-center']) . '11' . Html::endTag('th');
echo Html::beginTag('th', ['colspan' => '3', 'class' => 'text-center']) . '12' . Html::endTag('th');
echo Html::beginTag('th', ['rowspan' => '2']) . 'TOTAL' . Html::endTag('th');
echo Html::endTag('tr');
echo Html::beginTag('tr');
echo Html::beginTag('th') . 'PA' . Html::endTag('th');
echo Html::beginTag('th') . 'T' . Html::endTag('th');
echo Html::beginTag('th') . 'TOTAL' . Html::endTag('th');
echo Html::beginTag('th') . 'PA' . Html::endTag('th');
echo Html::beginTag('th') . 'T' . Html::endTag('th');
echo Html::beginTag('th') . 'TOTAL' . Html::endTag('th');
echo Html::beginTag('th') . 'PA' . Html::endTag('th');
echo Html::beginTag('th') . 'T' . Html::endTag('th');
echo Html::beginTag('th') . 'TOTAL' . Html::endTag('th');
echo Html::beginTag('th') . 'PA' . Html::endTag('th');
echo Html::beginTag('th') . 'T' . Html::endTag('th');
echo Html::beginTag('th') . 'TOTAL' . Html::endTag('th');
echo Html::beginTag('th') . 'PA' . Html::endTag('th');
echo Html::beginTag('th') . 'T' . Html::endTag('th');
echo Html::beginTag('th') . 'TOTAL' . Html::endTag('th');
echo Html::beginTag('th') . 'PA' . Html::endTag('th');
echo Html::beginTag('th') . 'T' . Html::endTag('th');
echo Html::beginTag('th') . 'TOTAL' . Html::endTag('th');
echo Html::beginTag('th') . 'PA' . Html::endTag('th');
echo Html::beginTag('th') . 'T' . Html::endTag('th');
echo Html::beginTag('th') . 'TOTAL' . Html::endTag('th');
echo Html::beginTag('th') . 'PA' . Html::endTag('th');
echo Html::beginTag('th') . 'T' . Html::endTag('th');
echo Html::beginTag('th') . 'TOTAL' . Html::endTag('th');
echo Html::beginTag('th') . 'PA' . Html::endTag('th');
echo Html::beginTag('th') . 'T' . Html::endTag('th');
echo Html::beginTag('th') . 'TOTAL' . Html::endTag('th');
echo Html::beginTag('th') . 'PA' . Html::endTag('th');
echo Html::beginTag('th') . 'T' . Html::endTag('th');
echo Html::beginTag('th') . 'TOTAL' . Html::endTag('th');
echo Html::beginTag('th') . 'PA' . Html::endTag('th');
echo Html::beginTag('th') . 'T' . Html::endTag('th');
echo Html::beginTag('th') . 'TOTAL' . Html::endTag('th');
echo Html::beginTag('th') . 'PA' . Html::endTag('th');
echo Html::beginTag('th') . 'T' . Html::endTag('th');
echo Html::beginTag('th') . 'TOTAL' . Html::endTag('th');
echo Html::endTag('tr');
echo Html::endTag('thead');
echo Html::beginTag('tbody');
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
$grandTotal = 0;
if (count($model) > 0) {
    $i = 1;
    foreach ($model as $id => $row) {
        $totalRekap = 0;
        echo Html::beginTag('tr');
        echo Html::beginTag('td') . $i . Html::endTag('td');
        echo Html::beginTag('td') . $arrKaryawan[$id]['nama'] . Html::endTag('td');
        echo Html::beginTag('td') . $arrKaryawan[$id]['nik'] . Html::endTag('td');
        echo Html::beginTag('td') . $arrKaryawan[$id]['doj'] . Html::endTag('td');
        for ($month = 1; $month < 13; $month++) {
            echo Html::beginTag('td', ['class' => 'text-center']) . $row[$month]['totalPulangAwal'] . Html::endTag('td');
            echo Html::beginTag('td', ['class' => 'text-center']) . $row[$month]['totalTerlambat'] . Html::endTag('td');
            if ((int) $row[$month]['totalJam'] > 0) {
                echo Html::beginTag('td', ['class' => 'text-center text-red']) . $row[$month]['totalJam'] . ' jam' . Html::endTag('td');
            } else {
                echo Html::beginTag('td', ['class' => 'text-center']) . $row[$month]['totalJam'] . Html::endTag('td');
            }

            $totalRekap += $row[$month]['totalJam'];
            $sub[$month] += $row[$month]['totalJam'];
        }
        if ($totalRekap > 0) {
            echo Html::beginTag('td', ['class' => 'text-center text-red']) . '<strong>' . $totalRekap . ' jam</strong>' . Html::endTag('td');
        } else {
            echo Html::beginTag('td', ['class' => 'text-center']) . $totalRekap . Html::endTag('td');
        }
        $grandTotal += $totalRekap;
        echo Html::endTag('tr');
        $i++;
    }
    echo Html::beginTag('tr');
    echo Html::beginTag('td') . Html::endTag('td');
    echo Html::beginTag('td') . 'TOTAL' . Html::endTag('td');
    echo Html::beginTag('td') . Html::endTag('td');
    echo Html::beginTag('td') . Html::endTag('td');
    for ($x = 1; $x < 13; $x++) {
        echo Html::beginTag('td') . Html::endTag('td');
        echo Html::beginTag('td') . Html::endTag('td');
        echo Html::beginTag('td', ['class' => 'text-center']) . '<strong>' . $sub[$x] . '</strong>' . Html::endTag('td');
    }
    echo Html::beginTag('td', ['class' => 'text-center']) . '<strong>' . $grandTotal . '</strong>' . Html::endTag('td');
    echo Html::endTag('tr');
}
echo Html::endTag('tbody');
echo Html::endTag('table');
echo Html::endTag('div');
echo Html::endTag('div');
$url = Url::to(['karyawan/print-laporan-rekap-absensi']);
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
