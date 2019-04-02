<?php
use yii\helpers\Html;

/* @var $perusahaan */
?>
<div>
    <div style="display: inline-block; position: relative; vertical-align: top; width: 510px;">
        <table style="border: 1px solid #333; min-width: 500px; font-size: 12px;">
            <tbody>
            <tr>
                <td colspan="4"><strong><?php echo strtoupper($perusahaan['nm_pt']); ?></strong></td>
            </tr>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
                <td style="width: 30%;">SLIP GAJI</td>
                <td style="width: 15%;"><?php echo Html::img('@web/images/slip/slip-gaji.png', ['style' => 'width: 95%;']); ?></td>
                <td>:</td>
                <td style="width: 65%;"><?php echo $model['bulan'] . ' ' . $model['tahun']; ?></td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td><?php echo Html::img('@web/images/slip/nama.png', ['style' => 'width: 50%;']); ?></td>
                <td>:</td>
                <td><?php echo $informasi_pribadi->nama; ?></td>
            </tr>
            <tr>
                <td>NO. KARYAWAN</td>
                <td><?php echo Html::img('@web/images/slip/no-karyawan.png', ['style' => 'width: 100%;']); ?></td>
                <td>:</td>
                <td><?php echo $informasi_pribadi->nik; ?></td>
            </tr>
            <tr>
                <td>Date Of Joint</td>
                <td><?php echo Html::img('@web/images/slip/doj.png', ['style' => 'width: 70%;']); ?></td>
                <td>:</td>
                <td><?php echo $informasi_pribadi->tgl_bergabung; ?></td>
            </tr>
            <tr>
                <td>GRADE / LEVEL</td>
                <td><?php echo Html::img('@web/images/slip/grade-level.png', ['style' => 'width: 60%;']); ?></td>
                <td>:</td>
                <td><?php echo $informasi_pribadi->nm_jabatan; ?></td>
            </tr>
            <tr>
                <td>SECTION</td>
                <td><?php echo Html::img('@web/images/slip/section.png', ['style' => 'width: 50%;']); ?></td>
                <td>:</td>
                <td><?php echo $section; ?></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div style="display: inline-block; position: relative; vertical-align: top; margin-left: 60px; width: 700px;">
        <table style="font-size: 12px; width: 500px;">
            <tbody>
            <tr>
                <td><strong>PENERIMAAN</strong></td>
            </tr>
            <tr>
                <td style="width: 35%;">Upah Pokok</td>
                <td style="width: 10%;"><?php echo Html::img('@web/images/slip/upah-pokok.png', ['style' => 'width: 95%;']); ?></td>
                <td style="width: 1%;">:</td>
                <td style="text-align: right; width: 15%;"><?php
                    if (array_key_exists(2, $detail) === true) {
                        echo number_format($detail[2]['subtotal']);
                    } else {
                        echo '0';
                    }
                    ?></td>
                <td></td>
            </tr>
            <tr>
                <td>Tj. Jabatan</td>
                <td style="width: 10%;"><?php echo Html::img('@web/images/slip/tj-jabatan.png', ['style' => 'width: 95%;']); ?></td>
                <td>:</td>
                <td style="text-align: right;"><?php
                    if (array_key_exists(3, $detail) === true) {
                        echo number_format($detail[3]['subtotal']);
                    } else {
                        echo '0';
                    }
                    ?></td>
            </tr>
            <tr>
                <td>Tj. Transport</td>
                <td style="width: 10%;"><?php echo Html::img('@web/images/slip/tj-transport.png', ['style' => 'width: 95%;']); ?></td>
                <td>:</td>
                <td style="text-align: right;">
                    <?php
                    if (array_key_exists(4, $detail) === true) {
                        echo number_format($detail[4]['subtotal']);
                    } else {
                        echo '0';
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Tj. Shift</td>
                <td style="width: 10%;"><?php echo Html::img('@web/images/slip/tj-shift.png', ['style' => 'width: 95%;']); ?></td>
                <td>:</td>
                <td style="text-align: right;"><?php
                    if (array_key_exists(5, $detail) === true) {
                        echo number_format($detail[5]['subtotal']);
                    } else {
                        echo '0';
                    }
                    ?></td>
            </tr>
            <tr>
                <td>Lembur</td>
                <td style="width: 10%;"><?php echo Html::img('@web/images/slip/lembur.png', ['style' => 'width: 95%;']); ?></td>
                <td>:</td>
                <td style="text-align: right;"><?php echo number_format($lembur); ?></td>
            </tr>
            <tr>
                <td>Pajak</td>
                <td style="width: 10%;"><?php echo Html::img('@web/images/slip/pajak.png', ['style' => 'width: 95%;']); ?></td>
                <td>:</td>
                <td></td>
            </tr>
            <tr>
                <td>Lain-Lain</td>
                <td style="width: 10%;"><?php echo Html::img('@web/images/slip/lain-lain.png', ['style' => 'width: 95%;']); ?></td>
                <td>:</td>
                <td></td>
            </tr>
            <tr>
                <td><strong>TOTAL PENERIMAAN</strong></td>
                <td style="width: 10%;"><?php echo Html::img('@web/images/slip/total-penerimaan.png', ['style' => 'width: 95%;']); ?></td>
                <td>:</td>
                <td style="text-align: right; font-weight: bold;"><?php echo number_format($totalPendapatan); ?></td>
            </tr>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
                <td><strong>POTONGAN</strong></td>
            </tr>
            <tr>
                <td>BPJS Tenaga Kerja</td>
                <td style="width: 10%;"><?php echo Html::img('@web/images/slip/bpjs-tenaga-kerja.png', ['style' => 'width: 95%;']); ?></td>
                <td>:</td>
                <td style="text-align: right;"><?php
                    if (array_key_exists(6, $detail) === true) {
                        echo number_format($detail[6]['subtotal']);
                    } else {
                        echo '0';
                    }
                    ?></td>
            </tr>
            <tr>
                <td>BPJS Kesehatan</td>
                <td style="width: 10%;"><?php echo Html::img('@web/images/slip/bpjs-kesehatan.png', ['style' => 'width: 95%;']); ?></td>
                <td>:</td>
                <td style="text-align: right;"><?php
                    if (array_key_exists(7, $detail) === true) {
                        echo number_format($detail[7]['subtotal']);
                    } else {
                        echo '0';
                    }
                    ?></td>
            </tr>
            <tr>
                <td>Pajak (PPh 21)</td>
                <td style="width: 10%;"><?php echo Html::img('@web/images/slip/pajak-pph21.png', ['style' => 'width: 95%;']); ?></td>
                <td>:</td>
                <td style="text-align: right;"></td>
            </tr>
            <tr>
                <td>Ijin</td>
                <td><?php echo Html::img('@web/images/slip/ijin-2.png', ['style' => 'width: 65%;']); ?></td>
                <td>:</td>
                <td style="text-align: right;"><?php echo number_format($potonganIjin); ?></td>
            </tr>
            <tr>
                <td>Alpa</td>
                <td><?php echo Html::img('@web/images/slip/alpa-2.png', ['style' => 'width: 65%;']); ?></td>
                <td>:</td>
                <td style="text-align: right;"><?php echo number_format($potonganAlpa); ?></td>
            </tr>
            <tr>
                <td>Pulg Awal / Terlambat</td>
                <td><?php echo Html::img('@web/images/slip/pulang-awal-terlambat-2.png', ['style' => 'width: 100%;']); ?></td>
                <td>:</td>
                <td style="text-align: right;"><?php echo number_format($potonganPulangAwal); ?></td>
            </tr>
            <tr>
                <td><strong>TOTAL POTONGAN</strong></td>
                <td style="width: 10%;"><?php echo Html::img('@web/images/slip/total-potongan.png', ['style' => 'width: 95%;']); ?></td>
                <td>:</td>
                <td style="text-align: right; font-weight: bold;"><?php echo number_format($totalPotongan); ?></td>
            </tr>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr style="background-color: #CCC;">
                <td><strong>TAKE HOME PAY</strong></td>
                <td style="width: 10%;"></td>
                <td>:</td>
                <td style="text-align: right; font-weight: bold; font-size: 16px;"><?php
                    echo number_format($thp); ?></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div style="display: inline-block; position: relative; width: 500px; margin-top: -200px">
        <table style="width: 520px; font-size: 12px;">
            <tbody>
            <tr>
                <td>No. Rekening</td>
                <td style="width: 10%;"><?php echo Html::img('@web/images/slip/no-rekening.png', ['style' => 'width: 95%;']); ?></td>
                <td>:</td>
                <td><?php echo $modelRekening['no_rek']; ?></td>
            </tr>
            <tr>
                <td>Hari Kerja</td>
                <td><?php echo Html::img('@web/images/slip/hari-kerja.png', ['style' => 'width: 95%;']); ?></td>
                <td>:</td>
                <td><?php echo $hariKerja; ?></td>
            </tr>
            <tr>
                <td>Masuk Kerja</td>
                <td><?php echo Html::img('@web/images/slip/masuk-kerja.png', ['style' => 'width: 95%;']); ?></td>
                <td>:</td>
                <td><?php echo $arrLembur['totalHari']; ?></td>
            </tr>
            <tr>
                <td colspan="4"><strong>ABSENSI</strong></td>
                <td><strong>LEMBUR</strong></td>
            </tr>
            <tr>
                <td>Cuti</td>
                <td><?php echo Html::img('@web/images/slip/cuti.png', ['style' => 'width: 65%;']); ?></td>
                <td>:</td>
                <td><?php echo $cuti; ?></td>
                <td>OTH Kerja Jam ke 9</td>
                <td style="width: 10%;"><?php echo Html::img('@web/images/slip/oth-kerja-jam-9.png', ['style' => 'width: 75%;']); ?></td>
                <td>:</td>
                <td>
                    <?php echo number_format($arrLembur['jam9']); ?>
                </td>
            </tr>
            <tr>
                <td>Sakit, Ijin Khusus</td>
                <td><?php echo Html::img('@web/images/slip/sakit-ijin-khusus.png', ['style' => 'width: 100%;']); ?></td>
                <td>:</td>
                <td><?php echo $sakit; ?></td>
                <td>OTH Kerja Jam ke 10 dst</td>
                <td><?php echo Html::img('@web/images/slip/oth-kerja-jam-10-dst.png', ['style' => 'width: 80%;']); ?></td>
                <td>:</td>
                <td><?php echo number_format($arrLembur['jam10']); ?></td>
            </tr>
            <tr>
                <td>Ijin</td>
                <td><?php echo Html::img('@web/images/slip/ijin.png', ['style' => 'width: 65%;']); ?></td>
                <td>:</td>
                <td><?php echo $ijin; ?></td>
                <td>OT Hari Libur 8 Jam Pertama</td>
                <td><?php echo Html::img('@web/images/slip/oth-libur-jam-8.png', ['style' => 'width: 80%;']); ?></td>
                <td>:</td>
                <td><?php echo number_format($arrLembur['jam8Libur']); ?></td>
            </tr>
            <tr>
                <td>Alpa</td>
                <td><?php echo Html::img('@web/images/slip/alpa.png', ['style' => 'width: 65%;']); ?></td>
                <td>:</td>
                <td><?php echo $alpa; ?></td>
                <td>OT Hari Libur jam ke 9</td>
                <td><?php echo Html::img('@web/images/slip/oth-libur-jam-9.png', ['style' => 'width: 100%;']); ?></td>
                <td>:</td>
                <td><?php echo number_format($arrLembur['jam9Libur']); ?></td>
            </tr>
            <tr>
                <td>Pulg Awal / Terlambat</td>
                <td><?php echo Html::img('@web/images/slip/pulang-awal-terlambat.png', ['style' => 'width: 100%;']); ?></td>
                <td>:</td>
                <td><?php echo $pulangAwal; ?></td>
                <td>OT Hari Libur jam ke 10 dst</td>
                <td><?php echo Html::img('@web/images/slip/oth-libur-jam-10-dst.png', ['style' => 'width: 100%;']); ?></td>
                <td>:</td>
                <td><?php echo number_format($arrLembur['jam10Libur']); ?></td>
            </tr>
            </tbody>
        </table>
        <table cellspacing="0" cellpadding="0">
            <tr>
                <td rowspan="2"><?php echo Html::img('@web/images/logo-transparant-75.png', ['style' => 'width: 100%;']); ?></td>
                <td><strong><?php echo strtoupper($perusahaan['nm_pt']); ?></strong></td>

            </tr>
            <tr>
                <td>Private and Confidential</td>
            </tr>
        </table>

    </div>
</div>
