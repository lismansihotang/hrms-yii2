<?php
use yii\helpers\Html;
use yii\helpers\Url;

echo Html::beginTag('h3') . 'Departemen' . Html::endTag('h3');
?>
<table class="table table-bordered table-hover">
    <tbody>
    <tr>
        <td colspan="3">
            <div class="btn-group margin-bottom-5 pull-right">
                <?php
                echo Html::button(
                    '<span class="glyphicon glyphicon-plus"></span>',
                    [
                        'value' => Url::toRoute(['karyawan-departemen/create', 'id_karyawan' => $model->id_karyawan]),
                        'class' => 'modalButtonView btn btn-sm btn-success',
                        'title' => 'Create Data'
                    ]
                ); ?>
            </div>
        </td>
    </tr>
    <?php
    if (count($modelDepartemen) > 0) {
        foreach ($modelDepartemen as $row) {
            ?>
            <tr>
                <td><?php echo $row['singkatan']; ?></td>
                <td><?php echo $row['nm_dept']; ?></td>
                <td>
                    <div class="btn-group margin-bottom-5 pull-right">
                        <?php
                        echo Html::button(
                            '<span class="glyphicon glyphicon-edit"></span>',
                            [
                                'value' => Url::toRoute(['karyawan-departemen/update', 'id_karyawan' => $model->id_karyawan, 'id' => $row['id_relasi']]),
                                'class' => 'modalButtonView btn btn-sm btn-primary',
                                'title' => 'Update Data'
                            ]
                        );
                        echo Html::a(
                            '<span class="glyphicon glyphicon-trash"></span>',
                            [
                                'karyawan-departemen/delete',
                                'id_karyawan' => $model->id_karyawan,
                                'id' => $row['id_relasi']
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
