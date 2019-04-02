<?php
use yii\helpers\Url;
/* @var $model */
/* @var $tgl_awal */
/* @var $tgl_akhir */
/* @var $nm_karyawan */
?>
<div class="absensi-index">
    <h2><?php echo $nm_karyawan;?></h2>
    <h3>Absensi Periode : <?php echo $tgl_awal.' s/d '.$tgl_akhir;?></h3>
    <table cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333; border-top: 1px solid #333; padding: 4px;">No</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333; border-top: 1px solid #333; padding: 4px;">Date</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333; border-top: 1px solid #333; padding: 4px;">Time</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333; border-top: 1px solid #333; padding: 4px;">Total</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333; border-top: 1px solid #333; padding: 4px;">Rest</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333; border-top: 1px solid #333; padding: 4px;">Work</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333; border-top: 1px solid #333; padding: 4px;">M</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333; border-top: 1px solid #333; padding: 4px;">N</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333; border-top: 1px solid #333; padding: 4px;">O</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333; border-top: 1px solid #333; padding: 4px;">P</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333; border-top: 1px solid #333; border-right: 1px solid #333; padding: 4px;">Q</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (count($model) > 0) {
            $i = 1;
            foreach ($model['arrAbsensi'] as $date => $row) {
                ?>
                <tr>
                    <td style="border-left: 1px solid #333; border-bottom: 1px solid #333; text-align: center; padding: 3px;"><?php echo $i; ?></td>
                    <td style="border-left: 1px solid #333; border-bottom: 1px solid #333; text-align: center; padding: 3px;"><?php echo $date; ?></td>
                    <td style="border-left: 1px solid #333; border-bottom: 1px solid #333; text-align: center; padding: 3px;"><?php echo $row['in'] . ' - ' . $row['out']; ?></td>
                    <td style="border-left: 1px solid #333; border-bottom: 1px solid #333; text-align: center; padding: 3px;"><?php echo $row['total']; ?></td>
                    <td style="border-left: 1px solid #333; border-bottom: 1px solid #333; text-align: center; padding: 3px;"><?php echo $row['rest']; ?></td>
                    <td style="border-left: 1px solid #333; border-bottom: 1px solid #333; text-align: center; padding: 3px;"><?php echo $row['work']; ?></td>
                    <td style="border-left: 1px solid #333; border-bottom: 1px solid #333; text-align: center; padding: 3px;"><?php echo $row['m']; ?></td>
                    <td style="border-left: 1px solid #333; border-bottom: 1px solid #333; text-align: center; padding: 3px;"><?php echo $row['n']; ?></td>
                    <td style="border-left: 1px solid #333; border-bottom: 1px solid #333; text-align: center; padding: 3px;"><?php echo $row['o']; ?></td>
                    <td style="border-left: 1px solid #333; border-bottom: 1px solid #333; text-align: center; padding: 3px;"><?php echo $row['p']; ?></td>
                    <td style="border-left: 1px solid #333; border-bottom: 1px solid #333; border-right: 1px solid #333; text-align: center; padding: 3px;"><?php echo $row['q']; ?></td>
                </tr>
                <?php
                $i++;
            }
        }
        ?>
        <tr>
            <td colspan="2"></td>
            <td style="border-left: 1px solid #333; border-bottom: 1px solid #333; text-align: center; padding: 3px;"><?php echo $model['totalHari']; ?> Hari</td>
            <td style="border-left: 1px solid #333;"></td>
            <td></td>
            <td></td>
            <td style="text-align: center;"><?php echo $model['jam9']; ?></td>
            <td style="text-align: center;"><?php echo $model['jam10']; ?></td>
            <td style="text-align: center;"><?php echo $model['jam8Libur']; ?></td>
            <td style="text-align: center;"><?php echo $model['jam9Libur']; ?></td>
            <td style="text-align: center;"><?php echo $model['jam10Libur']; ?></td>
        </tr>
        </tbody>
    </table>
</div>
<script>
    window.print();
    window.location = '<?php echo Url::toRoute('karyawan/report-absensi'); ?>';
</script>