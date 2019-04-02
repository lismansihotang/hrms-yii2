<?php
use yii\helpers\Html;
use yii\helpers\Url;

echo Html::beginTag('h3') . 'Komponen Gaji' . Html::endTag('h3');
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
                        'value' => Url::toRoute(['komponen-gaji-karyawan/create', 'id_karyawan' => $model->id_karyawan]),
                        'class' => 'modalButtonView btn btn-sm btn-success',
                        'title' => 'Create Data'
                    ]
                ); ?>
            </div>
        </td>
    </tr>
    <?php
    if (count($modelKomponenGaji) > 0) {
        foreach ($modelKomponenGaji as $row) {
            ?>
            <tr>
                <td><?php echo $row['nm_komponen']; ?></td>
                <td><?php echo number_format($row['nominal']); ?></td>
                <td>
                    <div class="btn-group margin-bottom-5 pull-right">
                        <?php
                        echo Html::button(
                            '<span class="glyphicon glyphicon-edit"></span>',
                            [
                                'value' => Url::toRoute(['komponen-gaji-karyawan/update', 'id_karyawan' => $model->id_karyawan, 'id' => $row['id_kgk']]),
                                'class' => 'modalButtonView btn btn-sm btn-primary',
                                'title' => 'Update Data'
                            ]
                        );
                        echo Html::a(
                            '<span class="glyphicon glyphicon-trash"></span>',
                            [
                                'komponen-gaji-karyawan/delete',
                                'id_karyawan' => $model->id_karyawan,
                                'id' => $row['id_kgk']
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
    }
    ?>
    </tbody>
</table>
