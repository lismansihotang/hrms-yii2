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
$this->title = 'Laporan Rekapitulasi Absensi Karyawan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="absensi-index">
    <h1><?php echo Html::encode($this->title) ?></h1>
    <?php
    $form = ActiveForm::begin([
                'method' => 'post',
                'action' => 'index.php?r=karyawan/report-rekap-absensi',
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
    $beforeYear = $year - 5;
    $afterYear = $year + 5;
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

    <table class="table table-responsive table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Karyawan</th>
                <th>Tahun</th>
                <th>Jan</th>
                <th>Feb</th>
                <th>Mar</th>
                <th>Apr</th>
                <th>Mei</th>
                <th>Jun</th>
                <th>Jul</th>
                <th>Agu</th>
                <th>Sep</th>
                <th>Okt</th>
                <th>Nov</th>
                <th>Des</th>
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
                    echo Html::beginTag('td') . $row['thn'] . Html::endTag('td');
                    echo Html::beginTag('td') . $row['jan'] . Html::endTag('td');
                    echo Html::beginTag('td') . $row['feb'] . Html::endTag('td');
                    echo Html::beginTag('td') . $row['mar'] . Html::endTag('td');
                    echo Html::beginTag('td') . $row['apr'] . Html::endTag('td');
                    echo Html::beginTag('td') . $row['mei'] . Html::endTag('td');
                    echo Html::beginTag('td') . $row['jun'] . Html::endTag('td');
                    echo Html::beginTag('td') . $row['jul'] . Html::endTag('td');
                    echo Html::beginTag('td') . $row['agu'] . Html::endTag('td');
                    echo Html::beginTag('td') . $row['sep'] . Html::endTag('td');
                    echo Html::beginTag('td') . $row['okt'] . Html::endTag('td');
                    echo Html::beginTag('td') . $row['nov'] . Html::endTag('td');
                    echo Html::beginTag('td') . $row['des'] . Html::endTag('td');
                    echo Html::endTag('tr');
                    $i++;
                }
            }
            ?>
        </tbody>
    </table>
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
