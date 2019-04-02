<?php

use yii\helpers\Url;
?>
<h2 style="margin-bottom: 0px; padding-bottom: 0px;">REKAP ALL ATTENDANCE</h2>
<h3 style="display: inline-block; margin-bottom: 0px; padding-bottom: 0px; vertical-align: bottom;">TAHUN <?php echo $thn; ?></h3>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<h1 style="display: inline-block; margin-bottom: 0px; padding-bottom: 0px; vertical-align: bottom;">LAPORAN AKHIR ABSENSI</h1>
<table style="width: 1200px;" border="0" cellspacing="0">
    <thead>
        <tr>
            <th rowspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">No</th>
            <th rowspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">Nama</th>
            <th rowspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">NIK</th>
            <th rowspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">Dept/DOJ</th>
            <th rowspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">KERJA</th>
            <th rowspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">OVERTIME</th>
            <th colspan="2" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333;">CUTI</th>
            <th colspan="10" style="border-top: 1px solid #333; border-left: 1px solid #333; border-bottom: 1px solid #333; border-right: 1px solid #333;">TIDAK MASUK KERJA</th>
        </tr>
        <tr>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333;">PAKAI</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333;">SISA</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333;">SAKIT DAN KHUSUS</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333;" colspan="2">IJIN</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333;" colspan="2">ALPA</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333;" colspan="2">PULANG AWAL</th>
            <th style="border-left: 1px solid #333; border-bottom: 1px solid #333; border-right: 1px solid #333;" colspan="2">TERLAMBAT</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (count($model) > 0) {
            $i = 1;
            foreach ($model as $id => $row) {
                ?>
                <tr>
                    <td style="border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $i; ?></td>
                    <td style="border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $arrKaryawan[$id]['nama']; ?></td>
                    <td style="border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $arrKaryawan[$id]['nik']; ?></td>
                    <td style="border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $arrKaryawan[$id]['doj']; ?></td>
                    <td style="border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php
                        if ($modelKerja[$id]['kerja'] > 0) {
                            if ($modelKerja[$id]['totalTahun'] > 0) {
                                echo round(($modelKerja[$id]['kerja'] / $modelKerja[$id]['totalTahun']), 2) . ' %';
                            }
                        }
                        ?></td>
                    <td style="border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $modelOT[$id]; ?></td>
                    <?php if (array_key_exists(5, $row) === true) { ?>
                        <td style="border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $row[5]; ?></td>
                        <td style="border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $quotaCuti - $row[5]; ?></td>
                    <?php } else { ?>
                        <td style="border-left: 1px solid #333; border-bottom: 1px solid #333;">0</td>
                        <td style="border-left: 1px solid #333; border-bottom: 1px solid #333;">0</td>
                        <?php
                    }
                    if (array_key_exists(2, $row) === true) {
                        if (array_key_exists(7, $row) === true) {
                            ?>
                            <td style="border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo ($row[2] + $row[7]); ?> </td>
                            <?php
                        } else {
                            ?>
                            <td style="border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $row[2]; ?></td>
                            <?php
                        }
                    } else {
                        ?>
                        <td style="border-left: 1px solid #333; border-bottom: 1px solid #333;">0</td>
                        <?php
                    }
                    ?>
                    <td style="border-left: 1px solid #333; border-bottom: 1px solid #333;">0</td>
                    <?php
                    if (array_key_exists(3, $row) === true) {
                        ?>
                        <td style="border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $row[3]; ?></td>
                    <?php } else { ?>
                        <td style="border-left: 1px solid #333; border-bottom: 1px solid #333;">0</td>
                        <?php
                    }
                    if (array_key_exists(4, $row) === true) {
                        ?>
                        <td style="border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $row[4]; ?></td>
                    <?php } else { ?>
                        <td style="border-left: 1px solid #333; border-bottom: 1px solid #333;">0</td>
                    <?php }
                    ?>
                    <td style="border-left: 1px solid #333; border-bottom: 1px solid #333;">0</td>
                    <td style="border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $modelPAT[$id]['terlambat']; ?></td>
                    <td style="border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $modelPAT[$id]['totalTerlambat']; ?></td>
                    <td style="border-left: 1px solid #333; border-bottom: 1px solid #333;"><?php echo $modelPAT[$id]['pulangAwal']; ?></td>
                    <td style="border-left: 1px solid #333; border-bottom: 1px solid #333; border-right: 1px solid #333;"><?php echo $modelPAT[$id]['totalPulangAwal']; ?></td>
                </tr>
                <?php
                $i++;
            }
        }
        ?>
    </tbody>
</table>
<br/>
<script>
    window.print();
    window.location = '<?php echo Url::toRoute('karyawan/laporan-akhir-absensi'); ?>';
</script>