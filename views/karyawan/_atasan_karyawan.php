<?php
use yii\helpers\Html;
use yii\helpers\Url;
echo Html::beginTag('h3') . 'Atasan' . Html::endTag('h3');
?>
<table class="table table-bordered table-hover">
    <tbody>
    <?php
    if (count($modelKaryawanAtasan) > 0) {
        ?>
        <tr>
            <td colspan="2">
                <div class="btn-group margin-bottom-5 pull-right">
                    <?php
                    echo Html::button(
                        '<span class="glyphicon glyphicon-edit"></span>',
                        [
                            'value' => Url::toRoute(['karyawan-atasan/update', 'id_karyawan' => $model->id_karyawan, 'id' => $modelKaryawanAtasan['id_atasan']]),
                            'class' => 'modalButtonView btn btn-sm btn-primary',
                            'title' => 'Update Data'
                        ]
                    );
                    echo Html::a(
                        '<span class="glyphicon glyphicon-trash"></span>',
                        [
                            'karyawan-atasan/delete',
                            'id_karyawan' => $model->id_karyawan,
                            'id' => $modelKaryawanAtasan['id_atasan']
                        ],
                        [
                            'class' => 'btn btn-sm btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]
                    ); ?>
                </div>
            </td>
        </tr>
        <tr>
            <td>Nama Atasan</td>
            <td><?php echo $modelKaryawanAtasan['nama']; ?></td>
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
                            'value' => Url::toRoute(['karyawan-atasan/create', 'id_karyawan' => $model->id_karyawan]),
                            'class' => 'modalButtonView btn btn-sm btn-success',
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
