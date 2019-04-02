<?php

use yii\helpers\Url;
?>
<h2 style="margin-bottom: 0px; padding-bottom: 0px;">REKAP ALL ATTENDANCE</h2>
<h3 style="display: inline-block; margin-bottom: 0px; padding-bottom: 0px; vertical-align: bottom;">TAHUN <?php echo $thn; ?></h3>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<h1 style="display: inline-block; margin-bottom: 0px; padding-bottom: 0px; vertical-align: bottom;">REKAPITULASI ABSENSI</h1>
<table style="width: 1200px;" border="0" cellspacing="0">
    <thead>
        <tr>
            <th rowspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">No</th>
            <th rowspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">Nama</th>
            <th rowspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">NIK</th>
            <th rowspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">Dept/DOJ</th>
            <th colspan="3" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">1</th>
            <th colspan="3" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">2</th>
            <th colspan="3" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">3</th>
            <th colspan="3" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">4</th>
            <th colspan="3" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">5</th>
            <th colspan="3" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">6</th>
            <th colspan="3" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">7</th>
            <th colspan="3" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">8</th>
            <th colspan="3" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">9</th>
            <th colspan="3" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">10</th>
            <th colspan="3" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">11</th>
            <th colspan="3" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">12</th>
            <th rowspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333; border-right: 1px solid #333;">TOTAL</th>
        </tr>
        <tr>
            <?php
            for ($th = 1; $th < 13; $th++) {
                ?>
                <th style="border-left: 1px solid #333; border-bottom: 1px solid #333;">PA</th>
                <th style="border-left: 1px solid #333; border-bottom: 1px solid #333;">T</th>
                <th style="border-left: 1px solid #333; border-bottom: 1px solid #333;">TOTAL</th>
                    <?php
                }
                ?>
        </tr>
    </thead>
    <tbody>
        <?php
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
        $i = 1;
        if (count($model) > 0) {
            foreach ($model as $id => $row) {
                $totalRekap = 0;
                ?>
                <tr>
                    <td style="border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $i; ?></td>
                    <td style="border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $arrKaryawan[$id]['nama']; ?></td>
                    <td style="border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $arrKaryawan[$id]['nik']; ?></td>
                    <td style="border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $arrKaryawan[$id]['doj']; ?> </td>
                    <?php
                    for ($month = 1; $month < 13; $month++) {
                        ?>
                        <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $row[$month]['totalPulangAwal']; ?></td>
                        <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $row[$month]['totalTerlambat']; ?></td>
                        <?php if ((int) $row[$month]['totalJam'] > 0) { ?>
                            <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $row[$month]['totalJam'] . ' jam'; ?></td>
                        <?php } else { ?>
                            <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $row[$month]['totalJam']; ?></td>
                        <?php
                        }

                        $totalRekap += $row[$month]['totalJam'];
                        $sub[$month] += $row[$month]['totalJam'];
                    }
                    if ($totalRekap > 0) {
                        ?>

                        <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo '<strong>' . $totalRekap . ' jam</strong>'; ?></td>
                    <?php } else {
                        ?>
                        <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $totalRekap; ?></td>
                        <?php
                    }
                    $grandTotal += $totalRekap;
                    ?>
                </tr>
                <?php
                $i++;
            }
            ?>
            <tr>
                <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333;"></td>
                <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333;">TOTAL</td>
                <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333;"></td>
                <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333;"></td>
    <?php for ($x = 1; $x < 13; $x++) { ?>
                    <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333;"></td>
                    <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333;"></td>
                    <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo '<strong>' . $sub[$x] . '</strong>'; ?></td>
    <?php } ?>
                <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo '<strong>' . $grandTotal . '</strong>'; ?></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
<br/>
<script>
    window.print();
    window.location = '<?php echo Url::toRoute('karyawan/laporan-rekap-absensi'); ?>';
</script>