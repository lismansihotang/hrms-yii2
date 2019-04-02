<?php

/* @var $this yii\web\View */
/* @var $model app\models\RiwayatPendidikan */
/* @var $id_karyawan */

$this->title = 'Update Riwayat Pendidikan: ' . $model->id_rp;
?>
<div class="riwayat-pendidikan-update">
    <?php echo $this->render('_form', [
        'model' => $model,
        'id_karyawan' => $id_karyawan
    ]); ?>

</div>
