<?php
/* @var $this yii\web\View */
/* @var $model app\models\KomponenGajiKaryawan */
/* @var $id_karyawan */
$this->title = 'Create Komponen Gaji Karyawan';
?>
<div class="komponen-gaji-karyawan-create">
    <?php echo $this->render(
        '_form',
        [
            'model' => $model,
            'id_karyawan' => $id_karyawan
        ]
    ); ?>

</div>
