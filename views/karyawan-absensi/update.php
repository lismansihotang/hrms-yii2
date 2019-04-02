<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KaryawanAbsensi */

$this->title = 'Update Karyawan Absensi: ' . $model->id_karyawan_absensi;
$this->params['breadcrumbs'][] = ['label' => 'Karyawan Absensi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_karyawan_absensi, 'url' => ['view', 'id' => $model->id_karyawan_absensi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="table-responsive karyawan-absensi-update">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]); ?>

</div>
