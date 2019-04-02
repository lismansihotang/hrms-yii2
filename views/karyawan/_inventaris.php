<?php
use yii\helpers\Html;
use yii\helpers\Url;

echo Html::beginTag('h3') . 'Inventaris Barang' . Html::endTag('h3');
?>
<table class="table table-bordered table-hover">
    <tbody>
    <tr>
        <td colspan="7">
            <div class="btn-group margin-bottom-5 pull-right">
                <?php
                echo Html::button(
                    '<span class="glyphicon glyphicon-plus"></span>',
                    [
                        'value' => Url::toRoute(['karyawan-inventaris/create', 'id_karyawan' => $model->id_karyawan]),
                        'class' => 'modalButtonView btn btn-sm btn-success',
                        'title' => 'Create Data'
                    ]
                ); ?>
            </div>
        </td>
    </tr>
    <tr>
        <td>Barang</td>
        <td>Tgl. Inventaris</td>
        <td>Tgl. Terima</td>
        <td>Tgl. Kembali</td>
        <td>Jml</td>
        <td>Keterangan</td>
        <td></td>
    </tr>
    <?php
    if (count($modelInventaris) > 0) {
        foreach ($modelInventaris as $row) {
            ?>
            <tr>
                <td><?php echo $row['nm_barang']; ?></td>
                <td><?php echo $row['tgl_inventaris']; ?></td>
                <td><?php echo $row['tgl_terima']; ?></td>
                <td><?php echo $row['tgl_kembali']; ?></td>
                <td><?php echo $row['jml']; ?></td>
                <td><?php echo $row['ket']; ?></td>
                <td>
                    <div class="btn-group margin-bottom-5 pull-right">
                        <?php
                        echo Html::button(
                            '<span class="glyphicon glyphicon-edit"></span>',
                            [
                                'value' => Url::toRoute(['karyawan-inventaris/update', 'id_karyawan' => $model->id_karyawan, 'id' => $row['id_inventaris']]),
                                'class' => 'modalButtonView btn btn-sm btn-primary',
                                'title' => 'Update Data'
                            ]
                        );
                        echo Html::a(
                            '<span class="glyphicon glyphicon-trash"></span>',
                            [
                                'karyawan-inventaris/delete',
                                'id_karyawan' => $model->id_karyawan,
                                'id' => $row['id_inventaris']
                            ],
                            [
                                'class' => 'btn btn-sm btn-danger',
                                'title' => 'Hapus Data',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]
                        ); ?>
                    </div>
                </td>
            </tr>
            <?php
        }
    } else {
        echo '<tr><td colspan="3">Data Tidak Ada!!!</td></tr>';
    }
    ?>
    </tbody>
</table>
