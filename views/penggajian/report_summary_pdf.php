<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Perusahaan;
use app\models\Penggajian;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PenggajianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Report Rekapitulasi Penggajian';
$this->params['breadcrumbs'][] = $this->title;
?>
    <h3 style="text-align: center;">Rekapitulasi Pembayaran Gaji</h3>
<?php
if (count($pt) > 0) {
    echo '<h1 style="text-align: center;">' . $pt['nm_pt'] . '</h1>';
}
echo 'Periode : ' . $bulan . ' ' . $tahun;
if (count($data) > 0) {
    ?>
    <table style="width: 720px;" cellpadding="2" cellspacing="0">
        <thead>
        <tr>
            <th style="border: 1px solid #ccc;">No</th>
            <th style="border: 1px solid #ccc;">Departemen</th>
            <th colspan="2" style="border: 1px solid #ccc;">Biaya Pengeluaran</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $total = 0;
        $i = 1;
        foreach ($data as $key => $value) {
            ?>
            <tr>
                <td style="border-bottom: 1px solid #ccc; border-left: 1px solid #ccc; text-align: center; width: 50px;"><?php echo $i; ?></td>
                <td style="border-bottom: 1px solid #ccc; border-left: 1px solid #ccc;"><?php echo $key; ?></td>
                <td style="border-bottom: 1px solid #ccc; border-left: 1px solid #ccc; width: 50px;">Rp.</td>
                <td style="text-align: right; border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; width: 150px;"><?php echo number_format(
                        $value
                    ); ?></td>
            </tr>
            <?php
            $total += $value;
            $i++;
        }
        ?>
        <tr>
            <td colspan="2"></td>
            <td style="border-bottom: 2px solid #ccc;" colspan="2"><?php echo '<h2>Rp. ' . number_format(
                        $total
                    ) . '</h2>'; ?></td>
        </tr>
        </tbody>
    </table>
    <br />

    <table style="width: 720px;" cellpadding="2" cellspacing="0">
        <tr>
            <td colspan="3">&nbsp;</td>
            <td style="text-align: right;">
                <?php
                $arrPrinted = Yii::$app->dateConversion->konversiInd(date('Y-m-d'));
                echo 'Bekasi, ' . $arrPrinted['tgl'] . ' ' . $arrPrinted['bln'] . ' ' . $arrPrinted['thn'];
                ?>
            </td>
        </tr>
    </table>
    <table cellpadding="5" cellspacing="10" style="margin-top: 20px; margin-left: 75px;">
        <tr>
            <td style="border: 1px solid #333; text-align: center;">

                <?php echo $ttd[1]['jabatan'] . '<br/><br/><br/><br/>' . $ttd[1]['user']; ?>
            </td>
            <td>&nbsp;</td>
            <td style="border: 1px solid #333; text-align: center;">

                <?php echo $ttd[2]['jabatan'] . '<br/><br/><br/><br/>' . $ttd[2]['user']; ?>
            </td>
            <td>&nbsp;</td>
            <td style="border: 1px solid #333; text-align: center;">

                <?php echo $ttd[3]['jabatan'] . '<br/><br/><br/><br/>' . $ttd[3]['user']; ?>
            </td>
        </tr>
    </table>
    <?php
} else {
    echo 'Data Tidak dengan kriteria tersebut tidak ada';
}
