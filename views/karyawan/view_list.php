<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\tabs\TabsX;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Karyawan */
/* @var $modelInformasiPribadi */
/* @var $modelKaryawanAtasan */
/* @var $modelKomponenGaji */
/* @var $modelPendidikan */
/* @var $modelAbsensi app\models\LogAbsensi */
$nama = '';

if (count($modelInformasiPribadi) > 0 && $modelInformasiPribadi !== false) {
    $nama = $modelInformasiPribadi['nama'];
}
$this->title = '#' . $model->id_karyawan . ' / ' . $nama;
$this->params['breadcrumbs'][] = ['label' => 'Karyawan', 'url' => ['list-karyawan', 'status' => $status]];
$this->params['breadcrumbs'][] = $this->title;


# Modal Form
Modal::begin(
        [
            'id' => 'modal',
            'size' => 'modal-lg',
            'header' => '<span id="modalHeaderTitle"></span>',
            'headerOptions' => ['id' => 'modalHeader']
        ]
);
echo '<div id="modalContent"></div>';
Modal::end();
# End Modal Form
?>
<div class="table-responsive karyawan-view">
    <div class="col-sm-12">
        <h1><?php echo Html::encode($this->title); ?></h1>


        <div class="btn-group margin-bottom-5">
            <?php
            echo Html::a('Home', ['list-karyawan', 'status' => $status], ['class' => 'btn btn-sm btn-success']);
            echo Html::a('Update', ['update', 'id' => $model->id_karyawan], ['class' => 'btn btn-sm btn-primary']);
            echo Html::a('Delete', ['delete', 'id' => $model->id_karyawan], [
                'class' => 'btn btn-sm btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]);
            ?>
        </div>
    </div>
    <div class="col-sm-3">
        <?php
        echo DetailView::widget(
                [
                    'model' => $model,
                    'attributes' => [
                        'id_karyawan',
                        'nik',
                            ['label' => 'Status', 'value' => $model->status->nm_status],
                            ['label' => 'Perusahaan', 'value' => $model->perusahaan->nm_pt],
                            ['label' => 'Jabatan', 'value' => $model->jabatan->nm_jabatan],
                        'tgl_bergabung',
                    ],
                ]
        );
        ?>
    </div>
    <div class="col-sm-9 margin-bottom-25">
        <?php
        echo TabsX::widget(
                [
                    'position' => TabsX::POS_ABOVE,
                    'bordered' => true,
                    'encodeLabels' => false,
                    'height' => TabsX::SIZE_LARGE,
                    'items' => [
                            [
                            'label' => '<i class="glyphicon glyphicon-home"></i> Home',
                            'content' => $this->render(
                                    '_home', [
                                'model' => $model,
                                'image' => $image,
                                'modelInformasiPribadi' => $modelInformasiPribadi,
                                'modelDepartemen' => $modelDepartemen,
                                'modelKarir' => $modelKarir,
                                'modelStatus' => $modelStatus,
                                'modelInventaris' => $modelInventaris,
                                'modelSanksi' => $modelSanksi
                                    ]
                            ),
                            'active' => true
                        ],
                            [
                            'label' => '<i class="glyphicon glyphicon-user"></i> Informasi Pribadi',
                            'items' => [
                                    [
                                    'label' => 'Detail',
                                    'content' => $this->render(
                                            '_informasi_pribadi', ['model' => $model, 'modelInformasiPribadi' => $modelInformasiPribadi]
                                    )
                                ],
                                    [
                                    'label' => 'Pendidikan',
                                    'content' => $this->render(
                                            '_pendidikan', [
                                        'model' => $model,
                                        'modelPendidikan' => $modelPendidikan
                                            ]
                                    )
                                ],
                                    [
                                    'label' => 'Keluarga',
                                    'content' => $this->render(
                                            '_keluarga', [
                                        'model' => $model,
                                        'modelKeluarga' => $modelKeluarga
                                            ]
                                    )
                                ],
                                    [
                                    'label' => 'Photo',
                                    'content' => $this->render(
                                            '_image', [
                                        'model' => $model,
                                        'modelImage' => $modelImage
                                            ]
                                    )
                                ],
                            ]
                        ],
                            [
                            'label' => '<i class="glyphicon glyphicon-list-alt"></i> Pekerjaan',
                            'items' => [
                                    [
                                    'label' => 'Departemen',
                                    'content' => $this->render(
                                            '_departemen', [
                                        'model' => $model,
                                        'modelDepartemen' => $modelDepartemen
                                            ]
                                    )
                                ],
                                    [
                                    'label' => 'Atasan',
                                    'content' => $this->render(
                                            '_atasan_karyawan', [
                                        'model' => $model,
                                        'modelKaryawanAtasan' => $modelKaryawanAtasan
                                            ]
                                    )
                                ],
                                    [
                                    'label' => 'Karir',
                                    'content' => $this->render(
                                            '_karir', [
                                        'model' => $model,
                                        'modelKarir' => $modelKarir
                                            ]
                                    )
                                ],
                                    [
                                    'label' => 'Identitas',
                                    'content' => $this->render(
                                            '_identitas', [
                                        'model' => $model,
                                        'modelIdentitas' => $modelIdentitas
                                            ]
                                    )
                                ],
                                    [
                                    'label' => 'Inventaris',
                                    'content' => $this->render(
                                            '_inventaris', [
                                        'model' => $model,
                                        'modelInventaris' => $modelInventaris
                                            ]
                                    )
                                ],
                                    [
                                    'label' => 'Komponen Gaji',
                                    'content' => $this->render(
                                            '_komponen_gaji', [
                                        'model' => $model,
                                        'modelKomponenGaji' => $modelKomponenGaji
                                            ]
                                    )
                                ],
                                    [
                                    'label' => 'Fingerprint',
                                    'content' => $this->render(
                                            '_finger', [
                                        'model' => $model,
                                        'modelFinger' => $modelFinger
                                            ]
                                    )
                                ],
                                    [
                                    'label' => 'Status Pekerjaan',
                                    'content' => $this->render(
                                            '_status_karyawan', [
                                        'model' => $model,
                                        'modelStatus' => $modelStatus
                                            ]
                                    )
                                ],
                                    [
                                    'label' => 'Sanksi',
                                    'content' => $this->render(
                                            '_sanksi', [
                                        'model' => $model,
                                        'modelSanksi' => $modelSanksi
                                            ]
                                    )
                                ],
                                    [
                                    'label' => 'Rekening',
                                    'content' => $this->render(
                                            '_rekening', [
                                        'model' => $model,
                                        'modelRekening' => $modelRekening
                                            ]
                                    )
                                ],
                            ]
                        ],
                            [
                            'label' => '<i class="glyphicon glyphicon-book"></i> Absensi',
                            'content' => $this->render(
                                    '_karyawan_absensi', [
                                'model' => $model,
                                'image' => $image,
                                'modelAbsensi' => $modelAbsensi
                                    ]
                            )
                        ],
                    ],
                ]
        );
        ?>
    </div>
</div>
<?php
$js = <<<JS
$(document).ready(function(){
    var hashUrl = window.location.hash;
    if(hashUrl!==''){
        setTimeout(function() {
            $('a[href="'+hashUrl+'"]').trigger('click');
        },5);
    }
});
JS;
$this->registerJs($js);

