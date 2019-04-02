<?php

use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\InformasiPribadi;

/* @var $this yii\web\View */
/** @var $model */
/* @var $idKaryawan */
$this->title = 'Laporan Absensi';
$this->params['breadcrumbs'][] = $this->title;
$tglAwal = '';
$tglAkhir = '';
$post = Yii::$app->request->post();
if (count($post) > 0) {
    $tglAwal = $post['tgl_awal'];
    $tglAkhir = $post['tgl_akhir'];
}
?>
<div class="absensi-index">
    <h1><?php echo Html::encode($this->title) ?></h1>
    <?php
    $form = ActiveForm::begin([
                'method' => 'post',
                'action' => 'index.php?r=karyawan/report-absensi',
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
    echo Html::beginTag('label') . 'Periode Laporan' . Html::endTag('label');
    echo DatePicker::widget(
            [
                'name' => 'tgl_awal',
                'name2' => 'tgl_akhir',
                'attribute' => 'tgl_awal',
                'attribute2' => 'tgl_akhir',
                'value' => $tglAwal,
                'value2' => $tglAkhir,
                'id' => 'tgl_awal',
                'options' => ['placeholder' => 'Tgl. Awal'],
                'options2' => ['placeholder' => 'Tgl. Akhir'],
                'type' => DatePicker::TYPE_RANGE,
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'autoclose' => true,
                ]
            ]
    );
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
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Total</th>
                    <th>Rest</th>
                    <th>Work</th>
                    <th>M</th>
                    <th>N</th>
                    <th>O</th>
                    <th>P</th>
                    <th>Q</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (count($model) > 0) {
                    $i = 1;
                    foreach ($model['arrAbsensi'] as $date => $row) {
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $i; ?></td>
                            <td class="text-center"><?php echo $date; ?></td>
                            <td class="text-center"><?php echo $row['in'] . ' - ' . $row['out']; ?></td>
                            <td class="text-center"><?php echo $row['total']; ?></td>
                            <td class="text-center"><?php echo $row['rest']; ?></td>
                            <td class="text-center"><?php echo $row['work']; ?></td>
                            <td class="text-center"><?php echo $row['m']; ?></td>
                            <td class="text-center"><?php echo $row['n']; ?></td>
                            <td class="text-center"><?php echo $row['o']; ?></td>
                            <td class="text-center"><?php echo $row['p']; ?></td>
                            <td class="text-center"><?php echo $row['q']; ?></td>
                        </tr>
                        <?php
                        $i++;
                    }
                }
                ?>
                <tr>
                    <td colspan="2"></td>
                    <td class="text-center"><?php echo $model['totalHari']; ?> Hari</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-center"><?php echo $model['jam9']; ?></td>
                    <td class="text-center"><?php echo $model['jam10']; ?></td>
                    <td class="text-center"><?php echo $model['jam8Libur']; ?></td>
                    <td class="text-center"><?php echo $model['jam9Libur']; ?></td>
                    <td class="text-center"><?php echo $model['jam10Libur']; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php
$url = Url::to(['karyawan/print-report-absensi']);
$urlExport = Url::to(['karyawan/export-excel']);
$js = <<<JS
$('#cetak-laporan').click(function(){
    var tglAwal= $("#tgl_awal").val();
    var tglAkhir= $("#tgl_awal-2").val();
    var idKaryawan= $('#idKaryawan').val();
    window.location.href='$url&tgl_awal='+tglAwal+'&tgl_akhir='+tglAkhir+'&id_karyawan='+idKaryawan;
    return false;
});
$('#export-excel').click(function(){
    var tglAwal= $("#tgl_awal").val();
    var tglAkhir= $("#tgl_awal-2").val();
    var idKaryawan= $('#idKaryawan').val();
    window.location.href='$urlExport&tgl_awal='+tglAwal+'&tgl_akhir='+tglAkhir+'&id_karyawan='+idKaryawan;
    return false;
});
JS;
$this->registerJs($js);
