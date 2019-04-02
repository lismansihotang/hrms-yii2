<?php
use yii\helpers\Html;
use yii\helpers\Url;

echo Html::beginTag('h3') . 'Riwayat Pendidikan' . Html::endTag('h3');
?>
<table class="table table-bordered table-hover">
    <tbody>
    <tr>
        <td colspan="4">
            <div class="btn-group margin-bottom-5 pull-right">
                <?php
                echo Html::button(
                    '<span class="glyphicon glyphicon-plus"></span>',
                    [
                        'value' => Url::toRoute(['riwayat-pendidikan/create', 'id_karyawan' => $model->id_karyawan]),
                        'class' => 'modalButtonView btn btn-sm btn-success',
                        'title' => 'Create Data'
                    ]
                ); ?>
            </div>
        </td>
    </tr>
    <?php
    if (count($modelPendidikan) > 0) {
        foreach ($modelPendidikan as $row) {
            ?>
            <tr>
                <td><?php echo $row['nm_pendidikan']; ?></td>
                <td><?php echo $row['nm_tmpt']; ?></td>
                <td><?php echo $row['thn_lulus']; ?></td>
                <td>
                    <div class="btn-group margin-bottom-5 pull-right">
                        <?php
                        echo Html::button(
                            '<span class="glyphicon glyphicon-edit"></span>',
                            [
                                'value' => Url::toRoute(['riwayat-pendidikan/update', 'id_karyawan' => $model->id_karyawan, 'id' => $row['id_rp']]),
                                'class' => 'modalButtonView btn btn-sm btn-primary',
                                'title' => 'Update Data'
                            ]
                        );
                        echo Html::a(
                            '<span class="glyphicon glyphicon-trash"></span>',
                            [
                                'riwayat-pendidikan/delete',
                                'id_karyawan' => $model->id_karyawan,
                                'id' => $row['id_rp']
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
