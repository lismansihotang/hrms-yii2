<?php
use yii\helpers\Html;
use yii\helpers\Url;

echo Html::beginTag('h3') . 'Sanksi Pekerjaan' . Html::endTag('h3');
/* @var $modelSanksi */
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
                        'value' => Url::toRoute(['karyawan-sanksi/create', 'id_karyawan' => $model->id_karyawan]),
                        'class' => 'modalButtonView btn btn-sm btn-success',
                        'title' => 'Create Data'
                    ]
                ); ?>
            </div>
        </td>
    </tr>
    <?php
    if (count($modelSanksi) > 0) {
        foreach ($modelSanksi as $row) {
            ?>
            <tr>
                <td><?php echo $row['nm_jenis_sanksi']; ?></td>
                <td><?php echo $row['tgl_berlaku']; ?></td>
                <td><?php echo $row['tgl_berakhir']; ?></td>
                <td>
                    <div class="btn-group margin-bottom-5 pull-right">
                        <?php
                        echo Html::button(
                            '<span class="glyphicon glyphicon-edit"></span>',
                            [
                                'value' => Url::toRoute(['karyawan-sanksi/update', 'id_karyawan' => $model->id_karyawan, 'id' => $row['id_sanksi']]),
                                'class' => 'modalButtonView btn btn-sm btn-primary',
                                'title' => 'Update Data'
                            ]
                        );
                        echo Html::a(
                            '<span class="glyphicon glyphicon-trash"></span>',
                            [
                                'karyawan-sanksi/delete',
                                'id_karyawan' => $model->id_karyawan,
                                'id' => $row['id_sanksi']
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
