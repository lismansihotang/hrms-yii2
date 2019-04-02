<a href="index.php?r=penggajian/cetak-slip&id=<?php echo $model->id; ?>&id_karyawan=<?php echo $id_karyawan;?>"
   class="btn btn-primary pull-right"
   target="_blank">Cetak Slip</a>
<h2>Slip Gaji</h2>
<table class="table">
    <tbody>
    <?php
    if (count($komponen) > 0) {
        foreach ($komponen as $key => $val) {
            echo '<tr>';
            if (array_key_exists($key, $detail) == true) {
                echo '<td>' . $detail[$key]['nm_komponen'] . '</td><td>:</td><td>' . $detail[$key]['jumlah'] . ' x ' . number_format(
                        $detail[$key]['nominal']
                    ) . ' = ' . number_format(
                        $detail[$key]['subtotal']
                    ) . '</td>';
            } else {
                echo '<td>' . $val['nm_komponen'] . '</td><td>:</td><td>' . $val['subtotal'] . '</td>';
            }
            echo '</tr>';
        }
    }
    ?>
    </tbody>
</table>

