<?php
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\KaryawanKeluarga */
?>
<div class="table-responsive karyawan-keluarga-view">
    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_keluarga',
            'hubunganKeluarga.nm_hub_keluarga',
            'nama',
            'tgl_lahir',
            'tmp_lahir',
            'jk',
            'alamat:ntext',
            'no_telp',
            'email:email',
            'pendidikan.nm_pendidikan',
            'pekerjaan.nm_pekerjaan',
            'penghasilan.range_penghasilan',
        ],
    ]); ?>

</div>
