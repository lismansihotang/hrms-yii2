<?php
use yii\helpers\Html;
use yii\helpers\Url;

echo Html::beginTag('h3') . 'Keluarga' . Html::endTag('h3');
/* @var $model */
/* @var $modelFinger */
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
                        'value' => Url::toRoute(['karyawan-keluarga/create', 'id_karyawan' => $model->id_karyawan]),
                        'class' => 'modalButtonView btn btn-sm btn-success',
                        'title' => 'Create Data'
                    ]
                ); ?>
            </div>
        </td>
    </tr>
    <?php
    if (count($modelKeluarga) > 0) {
        foreach ($modelKeluarga as $row) {
            ?>
            <tr>
                <td><?php echo $row['nm_hub_keluarga']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['jk']; ?></td>
                <td>
                    <div class="btn-group margin-bottom-5 pull-right">
                        <?php
                        echo Html::button(
                            '<span class="glyphicon glyphicon-eye-open"></span>',
                            [
                                'value' => Url::toRoute(['karyawan-keluarga/view', 'id_karyawan' => $model->id_karyawan, 'id' => $row['id_keluarga']]),
                                'class' => 'modalButtonView btn btn-sm btn-info',
                                'title' => 'View Data'
                            ]
                        );
                        echo Html::button(
                            '<span class="glyphicon glyphicon-edit"></span>',
                            [
                                'value' => Url::toRoute(['karyawan-keluarga/update', 'id_karyawan' => $model->id_karyawan, 'id' => $row['id_keluarga']]),
                                'class' => 'modalButtonView btn btn-sm btn-primary',
                                'title' => 'Update Data'
                            ]
                        );
                        echo Html::a(
                            '<span class="glyphicon glyphicon-trash"></span>',
                            [
                                'karyawan-keluarga/delete',
                                'id_karyawan' => $model->id_karyawan,
                                'id' => $row['id_keluarga']
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
