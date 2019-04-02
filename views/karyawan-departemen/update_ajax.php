<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KaryawanDepartemen */
/* @var $id_karyawan */

$this->title = 'Update Karyawan Departemen: ' . $model->id_relasi;
?>
<div class="table-responsive karyawan-departemen-update">
    <?php echo $this->render('_form', [
        'model' => $model,
        'id_karyawan' => $id_karyawan
    ]); ?>

</div>
