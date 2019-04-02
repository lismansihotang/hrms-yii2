<?php
/* @var $this yii\web\View */
/* @var $model app\models\KomponenGajiKaryawan */
/* @var $id_karyawan */
$this->title = 'Update Komponen Gaji Karyawan: ' . $model->id_kgk;
?>
<div class="komponen-gaji-karyawan-update">
    <?php echo $this->render(
        '_form',
        [
            'model'       => $model,
            'id_karyawan' => $id_karyawan
        ]
    ); ?>

</div>
