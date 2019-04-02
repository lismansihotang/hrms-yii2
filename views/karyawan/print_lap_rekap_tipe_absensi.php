<?php
use yii\helpers\Url;
?>
<h2 style="margin-bottom: 0px; padding-bottom: 0px;">REKAP ALL ATTENDANCE</h2>
<h3 style="display: inline-block; margin-bottom: 0px; padding-bottom: 0px; vertical-align: bottom;">TAHUN <?php echo $thn; ?></h3>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<h1 style="display: inline-block; margin-bottom: 0px; padding-bottom: 0px; vertical-align: bottom;">OVER TIME</h1>
<table style="width: 1200px;" border="0" cellspacing="0">
    <thead>
        <tr>
            <th rowspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">No.</th>
            <th rowspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">Nama</th>
            <th rowspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">NIK</th>
            <th rowspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">DEPT/DOJ</th>
            <th style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">1</th>
            <th style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">2</th>
            <th style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">3</th>
            <th style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">4</th>
            <th style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">5</th>
            <th style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">6</th>
            <th style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">7</th>
            <th style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">8</th>
            <th style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">9</th>
            <th style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">10</th>
            <th style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">11</th>
            <th style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">12</th>
            <th style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333; border-right: 1px solid #333;"></th>
            <th>&nbsp;</th>
            <th colspan="12" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;"><h3>CUTI</h3></th>
            <th rowspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">CUTI <?php echo $thn; ?></th>
            <th rowspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333; border-right: 1px solid #333;">SISA</th>
        </tr>
        <tr>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333;">56.0</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333;">56.0</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333;">56.0</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333;">56.0</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333;">56.0</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333;">56.0</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333;">56.0</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333;">56.0</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333;">56.0</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333;">56.0</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333;">56.0</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333;">56.0</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333; border-right: 1px solid #333;"><?php echo number_format(56 * 12, "1"); ?></th>
            <th>&nbsp;</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333;">1</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333;">2</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333;">3</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333;">4</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333;">5</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333;">6</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333;">7</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333;">8</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333;">9</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333;">10</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333;">11</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333;">12</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;

        $grandTotalOT = 0;
        $subOT = [
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
        $subCuti = [
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
        $cutiTahunan = 0;
        $grandTotalCuti = 0;
        if (count($modelOT) > 0) {
            foreach ($modelOT as $idOT => $rowOT) {
                $sisaCuti = $quotaCuti;
                $totalOT = 0;
                ?>
                <tr>
                    <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $i; ?></td>
                    <td style="border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $arrKaryawan[$idOT]['nama']; ?></td>
                    <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $arrKaryawan[$idOT]['nik']; ?></td>
                    <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $arrKaryawan[$idOT]['doj']; ?></td>
                    <?php
                    for ($month = 1; $month < 13; $month++) {
                        $totalOT += $rowOT[$month];
                        $subOT[$month] += $rowOT[$month];
                        ?>
                        <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $rowOT[$month]; ?></td>
                        <?php
                    }
                    ?>
                    <?php
                    $grandTotalOT += $totalOT;
                    ?>
                    <td style="font-weight: bold; text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333; border-right: 1px solid #333;"><?php echo $totalOT; ?></td>
                    <td>&nbsp;</td>
                    <?php
                    for ($month = 1; $month < 13; $month++) {
                        $sisaCuti -= $modelCuti[$idOT][$month];
                        $subCuti[$month] += $modelCuti[$idOT][$month];
                        ?>
                        <td style="width: 25px; text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $modelCuti[$idOT][$month]; ?></td>
                        <?php
                    }
                    $grandTotalCuti += $sisaCuti;
                    ?>
                    <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $quotaCuti; ?></td>
                    <td style="font-weight: bold; text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333; border-right: 1px solid #333;"><?php echo $sisaCuti; ?></td>
                </tr>
                <?php
                $i++;
            }
            ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <?php
                for ($x = 1; $x < 13; $x++) {
                    ?>
                    <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $subOT[$x]; ?></td>
                    <?php
                }
                ?>
                <td style="font-weight: bold; text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333; border-right: 1px solid #333;"><?php echo $grandTotalOT; ?></td>
                <td>&nbsp;</td>
                <?php
                for ($x = 1; $x < 13; $x++) {
                    ?>
                    <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $subCuti[$x]; ?></td>
                    <?php
                }
                ?>
                <td style="text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $i * 12; ?></td>
                <td style="font-weight: bold; text-align: center; border-left: 1px solid #333; border-bottom: 1px solid #333; border-right: 1px solid #333;"><?php echo $grandTotalCuti; ?></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
<br/>
<script>
    window.print();
    window.location = '<?php echo Url::toRoute('karyawan/laporan-rekap-tipe-absensi'); ?>';
</script>