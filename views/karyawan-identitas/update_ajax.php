<?php
/* @var $this yii\web\View */
/* @var $model app\models\KaryawanIdentitas */
/* @var $id_karyawan */

$this->title = 'Update Karyawan Identitas: ' . $model->id_identitas;
?>
<div class="table-responsive karyawan-identitas-update">

    <?php echo $this->render('_form', [
        'model' => $model, 'id_karyawan' => $id_karyawan
    ]); ?>

</div>
