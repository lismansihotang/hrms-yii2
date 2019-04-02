<div style="width: 350px; border: 2px solid #333; padding: 2px;">
    <div style="text-align: center;">
        <?php
        $arrTglAwal = Yii::$app->dateConversion->konversiInd($model->tgl_awal);
        $arrTglAkhir = Yii::$app->dateConversion->konversiInd($model->tgl_akhir);
        $periode = 'Rekap Periode  ' . $arrTglAwal['tgl'] . ' ' . $arrTglAwal['bln'] . ' - ' . $arrTglAkhir['tgl'] . ' ' . $arrTglAkhir['bln'] . ' ' . $arrTglAkhir['thn'];
        if (count($perusahaan) > 0) {
            echo '<h3 style="margin-top: 0!important; margin-bottom: 0!important;">' . strtoupper(
                    $perusahaan->nm_pt
                ) . '</h3>';
            echo '<h5 style="margin-top: 0!important; margin-bottom: 0!important;">' . $perusahaan->alamat . '  <br/>Telp. ' . $perusahaan->no_telp . '  Fax. ' . $perusahaan->no_fax . '</h5>';
            echo '<h5 style="margin-top: 0!important;">' . strtoupper(
                    $periode
                ) . '</h5>';
        }
        ?>
    </div>
    <?php
    if (count($informasi_pribadi) > 0) {
        ?>
        <table>
            <tbody>
            <tr>
                <td>Nik</td>
                <td style="padding-left: 4px;">:</td>
                <td style="padding-left: 4px;"><?php echo $informasi_pribadi->nik; ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td style="padding-left: 4px;">:</td>
                <td style="padding-left: 4px;"><?php echo $informasi_pribadi->nama; ?></td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td style="padding-left: 4px;">:</td>
                <td style="padding-left: 4px;"><?php echo $informasi_pribadi->nm_jabatan; ?></td>
            </tr>
            </tbody>
        </table>
        <?php
    }
    ?>
    <table cellspacing="0" style="width: 100%; border: 1px solid #333; margin-top: 10px; margin-bottom: 10px;">
        <tbody style="margin-top: 0!important;">
        <?php
        $pendapatan = 0;
        $potongan = 0;
        if (count($detail) > 0) {
            $rows = count($detail);
            ?>
            <tr>
                <td style="font-size: 16px; font-weight: bold; width: 30%; vertical-align: top;"
                    rowspan="2">A. Gaji Pokok
                </td>
            </tr>
            <?php
            foreach ($komponen as $key => $val) {
                if (array_key_exists($key, $detail) === true) {
                    if ($detail[$key]['kategori_komponen'] === 'Gaji Pokok') {
                        echo '<tr>';
                        echo '<td>' . $detail[$key]['nm_komponen'] . '</td>';
                        echo '<td>Rp.</td>';
                        echo '<td style="text-align: right;">' . number_format(
                                $detail[$key]['subtotal']
                            ) . '</td>';
                        echo '</tr>';
                        $pendapatan += $detail[$key]['subtotal'];
                    }
                } else {
                    if ($val['kategori_komponen'] === 'Gaji Pokok') {
                        echo '<tr>';
                        echo '<td>' . $val['nm_komponen'] . '</td>';
                        echo '<td>Rp.</td>';
                        echo '<td style="text-align: right;">' .
                            $val['subtotal']
                            . '</td>';
                        echo '</tr>';
                    }
                }
            }
            ?>
            <tr>
                <td style="font-size: 16px; font-weight: bold; width: 30%; vertical-align: top;"
                    rowspan="<?php echo $total_rows_pendapatan; ?>">B. Tunjangan
                </td>
            </tr>
            <?php
            foreach ($komponen as $key => $val) {
                if (array_key_exists($key, $detail) === true) {
                    if ($detail[$key]['kategori_komponen'] === 'Pendapatan') {
                        echo '<tr>';
                        echo '<td>' . $detail[$key]['nm_komponen'] . '</td>';
                        echo '<td>Rp.</td>';
                        echo '<td style="text-align: right;">' . number_format(
                                $detail[$key]['subtotal']
                            ) . '</td>';
                        echo '</tr>';
                        $pendapatan += $detail[$key]['subtotal'];
                    }
                } else {
                    if ($val['kategori_komponen'] === 'Pendapatan') {
                        echo '<tr>';
                        echo '<td>' . $val['nm_komponen'] . '</td>';
                        echo '<td>Rp.</td>';
                        echo '<td style="text-align: right;">' .
                            $val['subtotal']
                            . '</td>';
                        echo '</tr>';
                    }
                }
            }
            ?>
            <tr>
                <?php
                if ($total_rows_potongan > 0) {
                    echo '<td style="font-size: 16px; font-weight: bold; width: 30%; vertical-align: top;"
                        rowspan="' . ($total_rows_potongan + 1) . '">C. Potongan
                    </td>';
                } else {
                    echo '<td style="font-size: 16px; font-weight: bold; width: 30%;">C. Potongan
                    </td><td>&nbsp;</td><td>Rp.</td><td style="text-align: right;">0</td>';
                }
                ?>
            </tr>
            <?php
            foreach ($komponen as $key => $val) {
                if (array_key_exists($key, $detail) === true) {
                    if ($detail[$key]['kategori_komponen'] === 'Potongan') {
                        echo '<tr>';
                        echo '<td>' . $detail[$key]['nm_komponen'] . '</td>';
                        echo '<td>Rp.</td>';
                        echo '<td style="text-align: right;">' . number_format(
                                $detail[$key]['subtotal']
                            ) . '</td>';
                        echo '</tr>';
                        $potongan += $detail[$key]['subtotal'];
                    }
                } else {
                    if ($val['kategori_komponen'] === 'Potongan') {
                        echo '<tr>';
                        echo '<td>' . $val['nm_komponen'] . '</td>';
                        echo '<td>Rp.</td>';
                        echo '<td style="text-align: right;">' .
                            $val['subtotal']
                            . '</td>';
                        echo '</tr>';
                    }
                }
            }
        } ?>
        <tr>
            <td style="font-weight: bold; vertical-align: top;" colspan="2">D. GAJI BERSIH</td>
            <td>Rp.</td>
            <td style="font-weight: bold; text-align: right;"><?php echo number_format(
                    $pendapatan - $potongan
                ); ?>
            </td>
        </tr>
        </tbody>
    </table>
    <div style="text-align: right;">
        <p style="margin-top: 10px; margin-bottom: 40px;">HRD & GA</p>
    </div>
    <div style="text-align: left;">
        <p style="margin-top: 10px; margin-bottom: 40px;">Sisa Pinjaman : </p>

        <p style="margin-top: -25px; margin-left: 60px;">Rp.</p>

        <p>
        <hr style="width: 70%; margin-top: -10px; border-bottom: 2px solid #333;">
        </p>
    </div>
    <sup>
        <?php $arrPrinted = Yii::$app->dateConversion->konversiInd(date('Y-m-d'));
        echo 'Printed By System : Bekasi, ' . $arrPrinted['tgl'] . ' ' . $arrPrinted['bln'] . ' ' . $arrPrinted['thn'];
        ?>
    </sup>
</div>
