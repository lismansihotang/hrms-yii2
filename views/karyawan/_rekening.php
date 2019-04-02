<?php
use yii\helpers\Html;
use yii\helpers\Url;

echo Html::beginTag('h3') . 'Rekening' . Html::endTag('h3');
/* @var $model */
/* @var $modelRekening */
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
                        'value' => Url::toRoute(['karyawan-rekening/create', 'id_karyawan' => $model->id_karyawan]),
                        'class' => 'modalButtonView btn btn-sm btn-success',
                        'title' => 'Create Data'
                    ]
                ); ?>
            </div>
        </td>
    </tr>
    <?php
    if (count($modelRekening) > 0) {
        foreach ($modelRekening as $row) {
            ?>
            <tr>
                <td><?php echo $row['nm_bank'] . ' / ' . $row['deskripsi']; ?></td>
                <td><?php echo $row['no_rek']; ?></td>
                <td><?php echo $row['nm_pemilik_rek']; ?></td>
                <td>
                    <div class="btn-group margin-bottom-5 pull-right">
                        <?php
                        echo Html::button(
                            '<span class="glyphicon glyphicon-edit"></span>',
                            [
                                'value' => Url::toRoute(['karyawan-rekening/update', 'id_karyawan' => $model->id_karyawan, 'id' => $row['id_rekening']]),
                                'class' => 'modalButtonView btn btn-sm btn-primary',
                                'title' => 'Update Data'
                            ]
                        );
                        echo Html::a(
                            '<span class="glyphicon glyphicon-trash"></span>',
                            [
                                'karyawan-rekening/delete',
                                'id_karyawan' => $model->id_karyawan,
                                'id' => $row['id_rekening']
                            ],
                            [
                                'class' => 'btn btn-sm btn-danger',
                                'title' => 'Delete Data',
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
