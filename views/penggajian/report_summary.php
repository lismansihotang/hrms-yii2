<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use app\models\Perusahaan;
use app\models\Penggajian;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PenggajianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Report Rekapitulasi Penggajian';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="penggajian-index">

        <h1><?php echo Html::encode($this->title); ?></h1>
        <?php
        $form = ActiveForm::begin();
        echo '<label class="control-label">Kriteria Laporan</label>';
        echo Select2::widget(
            [
                'name'          => 'id_perusahaan',
                'data'          => ArrayHelper::map(Perusahaan::find()->all(), 'id', 'nm_pt'),
                'options'       => ['placeholder' => 'Pilih Perusahaan', 'id' => 'id_perusahaan'],
                'pluginOptions' => ['allowClear' => true],
            ]
        );
        echo Select2::widget(
            [
                'name'          => 'bulan',
                'data'          => ArrayHelper::map(Penggajian::find()->all(), 'bulan', 'bulan'),
                'options'       => ['placeholder' => 'Pilih Bulan', 'id' => 'bulan'],
                'pluginOptions' => ['allowClear' => true],
            ]
        );
        echo Select2::widget(
            [
                'name'          => 'tahun',
                'data'          => ArrayHelper::map(Penggajian::find()->all(), 'tahun', 'tahun'),
                'options'       => ['placeholder' => 'Pilih Tahun', 'id' => 'tahun'],
                'pluginOptions' => ['allowClear' => true],
            ]
        );
        ?>
        <div class="form-group">
            <?php
            echo Html::submitButton(
                'Check Laporan',
                ['class' => 'btn btn-primary margin-top-5 margin-right-5']
            );
            echo Html::button(
                'Cetak Laporan',
                ['class' => 'btn btn-success margin-top-5 margin-right-5', 'id' => 'cetak-laporan']
            ); ?>
        </div>
        <h2>Beban Gaji Operasional</h2>
        <?php
        ActiveForm::end();
        if (count($data) > 0) {
            ?>
            <table class="table table-striped table-hover">
                <tbody>
                <?php
                $total = 0;
                $i = 1;
                foreach ($data as $key => $value) {
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $key; ?></td>
                        <td>Rp. <?php echo number_format($value); ?></td>
                    </tr>
                    <?php
                    $total += $value;
                    $i++;
                }
                ?>
                </tbody>
            </table>
            <hr />
            <?php
            echo '<h2>Rp. ' . number_format($total) . '</h2>';
        } else {
            echo 'Data Tidak dengan kriteria tersebut tidak ada';
        }
        ?>

    </div>
<?php
$url = Url::to(['penggajian/report-summary-pdf']);
$js = <<<JS
$('#cetak-laporan').click(function(){
    var idPT=$('#id_perusahaan').val();
    var bulan=$('#bulan').val();
    var tahun=$('#tahun').val();
     window.open('$url&id_perusahaan='+idPT+'&bulan='+bulan+'&tahun='+tahun,'_blank');
});
JS;
$this->registerJs($js);
