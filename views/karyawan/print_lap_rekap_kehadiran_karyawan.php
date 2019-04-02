<?php
use yii\helpers\Url;
?>
<h2 style="margin-bottom: 0px; padding-bottom: 0px;">REKAP ALL ATTENDANCE</h2>
<h3 style="display: inline-block; margin-bottom: 0px; padding-bottom: 0px; vertical-align: bottom;">TAHUN <?php echo $thn; ?></h3>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<h1 style="display: inline-block; margin-bottom: 0px; padding-bottom: 0px; vertical-align: bottom;">REKAPITULASI KEHADIRAN KARYAWAN</h1>
<table style="width: 1200px;" border="0" cellspacing="0">
    <thead>
        <tr>
            <th rowspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">No</th>
            <th rowspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">Nama</th>
            <th rowspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">NIK</th>
            <th rowspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">Dept/DOJ</th>
            <th colspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">1</th>
            <th colspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">2</th>
            <th colspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">3</th>
            <th colspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">4</th>
            <th colspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">5</th>
            <th colspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">6</th>
            <th colspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">7</th>
            <th colspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">8</th>
            <th colspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">9</th>
            <th colspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">10</th>
            <th colspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">11</th>
            <th colspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">12</th>
            <th colspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333; border-right: 1px solid #333;">TOTAL</th>
        </tr>
        <tr>
            <?php
            $totalMasukTahunan = 0;
            for ($x = 1; $x < 13; $x++) {
                if (count($arrKalenderKerja) > 0) {
                    ?>
                    <th colspan="2" style="border-left: 1px solid #333; border-bottom: 1px solid #333;">
                        <?php echo $arrKalenderKerja[$x]; ?>
                    </th>
                    <?php
                    $totalMasukTahunan += $arrKalenderKerja[$x];
                } else {
                    ?>
                    <th colspan="2" style="border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $x; ?></th>
                    <?php
                }
            }
            ?>
            <th colspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333; border-right: 1px solid #333;">
                <?php echo $totalMasukTahunan; ?>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
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
                ?>
                <tr>
                    <td style="border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $i; ?></td>
                    <td style="border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $arrKaryawan[$id]['nama']; ?></td>
                    <td style="border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $arrKaryawan[$id]['nik']; ?></td>
                    <td style="border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $arrKaryawan[$id]['doj']; ?></td>
                    <?php
                    $totalHadir = 0;
                    $totalMasukLibur = 0;
                    for ($month = 1; $month < 13; $month++) {
                        ?>
                        <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $row[$month]['hadir']; ?></td>
                        <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $row[$month]['masukLibur']; ?></td>
                        <?php
                        $totalHadir += $row[$month]['hadir'];
                        $totalMasukLibur += $row[$month]['masukLibur'];
                        $hadir[$month] += $row[$month]['hadir'];
                        $masukLibur[$month] += $row[$month]['masukLibur'];
                        $grandTotalHadir += $totalHadir;
                        $grandTotalMasukLibur += $totalMasukLibur;
                    }
                    ?>
                    <?php if ($totalHadir > 0) { ?>
                        <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333;">
                            <?php echo round(($totalHadir / $totalMasukTahunan), 2) . ' %'; ?>
                        </td>
                        <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333; border-right: 1px solid #333;">
                            <?php echo round(($totalMasukLibur / $totalMasukTahunan), 2) . ' %'; ?>
                        </td>
                    <?php } else { ?>
                        <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333;">0 %</td>
                        <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333; border-right: 1px solid #333;">0 %</td>
                        <?php
                    }
                    ?>

                </tr>
                <?php
                $i++;
            }
        }
        ?>
        <tr>
            <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333;"></td>
            <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333;">TOTAL</td>
            <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333;"></td>
            <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333;"></td>
            <?php for ($x = 1; $x < 13; $x++) { ?>
                <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $hadir[$x]; ?></td>
                <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $masukLibur[$x]; ?></td>
                <?php
            }

            if ($grandTotalHadir > 0) {
                $calcHadir = round(($grandTotalHadir / $totalMasukTahunan), 2) . ' %';
                $calcMasukLibur = round(($grandTotalMasukLibur / $totalMasukTahunan), 2) . ' %';
            }
            ?>
            <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $calcHadir; ?></td>
            <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333; border-right: 1px solid #333;"><?php echo $calcMasukLibur; ?></td>
        </tr>
    </tbody>
</table>
<br/>
<script>
    window.print();
    window.location = '<?php echo Url::toRoute('karyawan/laporan-rekapitulasi-kehadiran-karyawan'); ?>';
</script>