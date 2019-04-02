<?php
use yii\helpers\Html;
use yii\helpers\Url;

echo Html::beginTag('h3') . 'File Photo' . Html::endTag('h3');
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
                        'value' => Url::toRoute(['karyawan-file/create', 'id_karyawan' => $model->id_karyawan]),
                        'class' => 'modalButtonView btn btn-sm btn-success',
                        'title' => 'Create Data'
                    ]
                ); ?>
            </div>
        </td>
    </tr>
    <?php
    if (count($modelImage) > 0) {
        foreach ($modelImage as $row) {
            ?>
            <tr>
                <td>
                    <?php
                    echo Html::img('@web/upload/' . $row['nm_file'], ['class' => 'img img-thumbnail img-responsive']);
                    echo '<br/>';
                    echo $row['nm_file'];
                    ?>
                </td>
                <td>
                    <div class="btn-group margin-bottom-5 pull-right">
                        <?php
                        if ((integer)$row['is_active'] === 1) {
                            $glyphicon = '<span class="glyphicon glyphicon-check"></span>';
                            $msg = 'Are you sure you want to non active this item?';
                        } else {
                            $glyphicon = '<span class="glyphicon glyphicon-unchecked"></span>';
                            $msg = 'Are you sure you want to active this item?';
                        }

                        echo Html::a(
                            $glyphicon,
                            [
                                'karyawan-file/change-status',
                                'id_karyawan' => $model->id_karyawan,
                                'id' => $row['id_file'],
                                'status' => $row['is_active']
                            ],
                            [
                                'class' => 'btn btn-sm btn-info',
                                'title' => 'Active Data',
                                'data' => [
                                    'confirm' => $msg,
                                    'method' => 'post',
                                ],
                            ]
                        );
                        echo Html::a(
                            '<span class="glyphicon glyphicon-trash"></span>',
                            [
                                'karyawan-file/delete',
                                'id_karyawan' => $model->id_karyawan,
                                'id' => $row['id_file']
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
