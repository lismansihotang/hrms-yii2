<?php
use yii\helpers\Html;
use yii\helpers\Url;

echo Html::beginTag('h3') . 'Status Pekerjaan' . Html::endTag('h3');
/* @var $modelStatus */
/* @var $model */
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
                        'value' => Url::toRoute(['karyawan-status/create', 'id_karyawan' => $model->id_karyawan]),
                        'class' => 'modalButtonView btn btn-sm btn-success',
                        'title' => 'Create Data'
                    ]
                ); ?>
            </div>
        </td>
    </tr>
    <?php
    if (count($modelStatus) > 0) {
        foreach ($modelStatus as $row) {
            ?>
            <tr>
                <td><?php echo $row['nm_status']; ?></td>
                <td><?php echo $row['tgl_berlaku']; ?></td>
                <td><?php echo $row['tgl_berakhir']; ?></td>
                <td>
                    <div class="btn-group margin-bottom-5 pull-right">
                        <?php
                        echo Html::button(
                            '<span class="glyphicon glyphicon-edit"></span>',
                            [
                                'value' => Url::toRoute(['karyawan-status/update', 'id_karyawan' => $model->id_karyawan, 'id' => $row['id_status_karyawan']]),
                                'class' => 'modalButtonView btn btn-sm btn-primary',
                                'title' => 'Update Data'
                            ]
                        );
                        echo Html::a(
                            '<span class="glyphicon glyphicon-trash"></span>',
                            [
                                'karyawan-status/delete',
                                'id_karyawan' => $model->id_karyawan,
                                'id' => $row['id_status_karyawan']
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
