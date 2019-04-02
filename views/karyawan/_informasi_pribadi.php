<?php
use yii\helpers\Html;
use yii\helpers\Url;

echo Html::beginTag('h3') . 'Informasi Pribadi' . Html::endTag('h3');
?>
<table class="table table-bordered table-hover">
    <tbody>
    <?php
    if (count($modelInformasiPribadi) > 0) {
        ?>
        <tr>
            <td colspan="2">
                <div class="btn-group margin-bottom-5 pull-right">
                    <?php
                    echo Html::button(
                        '<span class="glyphicon glyphicon-edit"></span>',
                        [
                            'value' => Url::toRoute(['informasi-pribadi/update', 'id_karyawan' => $model->id_karyawan, 'id' => $modelInformasiPribadi['id_info']]),
                            'class' => 'modalButtonView btn btn-sm btn-primary',
                            'title' => 'Update Data'
                        ]
                    );
                    echo Html::a(
                        '<span class="glyphicon glyphicon-trash"></span>',
                        [
                            'informasi-pribadi/delete',
                            'id_karyawan' => $model->id_karyawan,
                            'id' => $modelInformasiPribadi['id_info']
                        ],
                        [
                            'class' => 'btn btn-sm btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                            'title' => 'Delete Data'
                        ]
                    ); ?>
                </div>
            </td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><?php echo $modelInformasiPribadi['nama']; ?></td>
        </tr>
        <tr>
            <td>Tempat Lahir</td>
            <td><?php echo $modelInformasiPribadi['tmp_lahir']; ?></td>
        </tr>
        <tr>
            <td>Tgl. Lahir</td>
            <td><?php echo $modelInformasiPribadi['tgl_lahir']; ?></td>
        </tr>
        <tr>
            <td>Status</td>
            <td><?php echo $modelInformasiPribadi['status_menikah']; ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><?php echo $modelInformasiPribadi['alamat']; ?></td>
        </tr>
        <tr>
            <td>Rumah Tinggal</td>
            <td><?php echo $modelInformasiPribadi['status_rumah']; ?></td>
        </tr>
        <tr>
            <td>No. Telp</td>
            <td><?php echo $modelInformasiPribadi['no_telp']; ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo $modelInformasiPribadi['email']; ?></td>
        </tr>
        <?php
    } else {
        ?>
        <tr>
            <td colspan="2">
                <div class="btn-group margin-bottom-5 pull-right">
                    <?php
                    echo Html::button(
                        '<span class="glyphicon glyphicon-plus"></span>',
                        [
                            'value' => Url::toRoute(['informasi-pribadi/create', 'id_karyawan' => $model->id_karyawan]),
                            'class' => 'modalButtonView btn btn-sm btn-primary',
                            'title' => 'Create Data'
                        ]
                    );
                    ?>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">Data Tidak Ada
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>