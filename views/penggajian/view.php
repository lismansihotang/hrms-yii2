<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\Penggajian */
$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Penggajian', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
# Modal Form
Modal::begin(
    [
        'id'            => 'modal',
        'size'          => 'modal-lg',
        'header'        => '<span id="modalHeaderTitle"></span>',
        'headerOptions' => ['id' => 'modalHeader']
    ]
);
echo '<div id="modalContent"></div>';
Modal::end();
# End Modal Form
?>
<div class="penggajian-view">

    <div class="row">
        <div class="col-md-12">
            <h1><?php echo Html::encode($this->title); ?></h1>


            <div class="btn-group margin-bottom-5">
                <?php
                echo Html::a('Home', ['index'], ['class' => 'btn btn-sm btn-success']);
                echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']); ?>
            </div>
        </div>
        <div class="col-md-3">
            <?php echo DetailView::widget(
                [
                    'model'      => $model,
                    'attributes' => [
                        'id',
                        'tgl',
                        'bulan',
                        'tahun',
                        'tgl_awal',
                        'tgl_akhir',
                        'perusahaan.nm_pt',
                    ],
                ]
            ); ?>
        </div>
        <div class="col-md-9">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th colspan="5">
                        <?php
                        echo Html::a(
                            'Proses Komponen',
                            ['penggajian-komponen/create-komponen-data', 'id' => $model->id],
                            ['class' => 'btn btn-sm btn-primary margin-right-5']
                        );
                        echo Html::a(
                            'Proses Absensi',
                            ['penggajian-karyawan/create-absensi-data', 'id' => $model->id],
                            ['class' => 'btn btn-sm btn-default margin-right-5']
                        );
                        echo Html::a(
                            'Proses Semua',
                            ['penggajian-karyawan/create-all-data', 'id' => $model->id],
                            ['class' => 'btn btn-sm btn-info margin-right-5']
                        );
                        echo Html::a(
                            'Reset Proses Penggajian',
                            ['penggajian-karyawan/reset-all-data', 'id' => $model->id],
                            ['class' => 'btn btn-sm btn-danger']
                        );
                        ?>
                    </th>
                </tr>
                <tr>
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>Pendapatan</th>
                    <th>Potongan</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td colspan="5">
                        <?php
                        if (count($arrKomponen) > 0) {
                            foreach ($arrKomponen as $komponen) {
                                echo '<span class="badge">' . $komponen['nm_komponen'] . '</span>';
                            }
                        } else {
                            echo 'Belum proses Komponen!!!';
                        }
                        ?>
                    </td>
                </tr>
                <?php
                if (Yii::$app->session->hasFlash('warning-payroll') === true) {
                    Alert::begin(
                        [
                            'options' => ['class' => 'alert-danger'],
                            'body'    => Yii::$app->session->getFlash('warning-payroll')
                        ]
                    );
                    Alert::end();
                    Yii::$app->session->removeFlash('warning-payroll');
                }
                if (Yii::$app->session->hasFlash('msg-payroll') === true) {
                    Alert::begin(
                        [
                            'options' => ['class' => 'alert-info'],
                            'body'    => Yii::$app->session->getFlash('msg-payroll')
                        ]
                    );
                    Alert::end();
                    Yii::$app->session->removeFlash('msg-payroll');
                }
                if (count($modelKaryawan) > 0) {
                    $i = 1;
                    foreach ($modelKaryawan as $row) {
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row->nama; ?></td>
                            <td><?php
                                if (array_key_exists($row->id_karyawan, $arrDataGajian) === true) {
                                    echo number_format($arrDataGajian[$row->id_karyawan]['pendapatan']);
                                }
                                ?></td>
                            <td><?php if (array_key_exists($row->id_karyawan, $arrDataGajian) === true) {
                                    echo number_format($arrDataGajian[$row->id_karyawan]['potongan']);
                                }; ?></td>
                            <td>
                                <div class="btn-group">
                                    <?php
                                    echo Html::button(
                                        'Proses',
                                        [
                                            'value' => Url::toRoute(
                                                [
                                                    'penggajian-karyawan/create-data-ajax',
                                                    'id'     => $row->id_karyawan,
                                                    'idGaji' => $model->id
                                                ]
                                            ),
                                            'class' => 'modalButtonView btn btn-sm btn-success',
                                            'title' => 'Proses Manual Penggajian'
                                        ]
                                    );
                                    echo Html::button(
                                        'Detail',
                                        [
                                            'value' => Url::toRoute(
                                                ['komponen-gaji-karyawan/view-ajax', 'id' => $row->id_karyawan]
                                            ),
                                            'class' => 'modalButtonView btn btn-sm btn-info',
                                            'title' => 'Detail Rincian Komponen Gaji'
                                        ]
                                    );
                                    echo Html::button(
                                        'Absensi',
                                        [
                                            'value' => Url::toRoute(
                                                [
                                                    'log-absensi/view-rincian',
                                                    'id'          => $model->id,
                                                    'id_karyawan' => $row->id_karyawan
                                                ]
                                            ),
                                            'class' => 'modalButtonView btn btn-sm btn-default',
                                            'title' => 'Rincian Absensi'
                                        ]
                                    );
                                    echo Html::button(
                                        'Slip',
                                        [
                                            'value' => Url::toRoute(
                                                [
                                                    'penggajian/view-slip',
                                                    'id'          => $model->id,
                                                    'id_karyawan' => $row->id_karyawan
                                                ]
                                            ),
                                            'class' => 'modalButtonView btn btn-sm btn-warning',
                                            'title' => 'View Slip Gaji'
                                        ]
                                    );
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    }
                }
                ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
