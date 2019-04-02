<?php
use yii\helpers\Html;
use yii\helpers\Url;

echo Html::beginTag('h3') . 'Fingerprint Id' . Html::endTag('h3');
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
                        'value' => Url::toRoute(['karyawan-finger-id/create', 'id_karyawan' => $model->id_karyawan]),
                        'class' => 'modalButtonView btn btn-sm btn-success',
                        'title' => 'Create Data'
                    ]
                ); ?>
            </div>
        </td>
    </tr>
    <?php
    if (count($modelFinger) > 0) {
        foreach ($modelFinger as $row) {
            ?>
            <tr>
                <td><?php echo $row['log_finger_id']; ?></td>
                <td>
                    <div class="btn-group margin-bottom-5 pull-right">
                        <?php
                        echo Html::button(
                            '<span class="glyphicon glyphicon-edit"></span>',
                            [
                                'value' => Url::toRoute(['karyawan-finger-id/update', 'id_karyawan' => $model->id_karyawan, 'id' => $row['id_kfi']]),
                                'class' => 'modalButtonView btn btn-sm btn-primary',
                                'title' => 'Update Data'
                            ]
                        );
                        echo Html::a(
                            '<span class="glyphicon glyphicon-trash"></span>',
                            [
                                'karyawan-finger-id/delete',
                                'id_karyawan' => $model->id_karyawan,
                                'id' => $row['id_kfi']
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
