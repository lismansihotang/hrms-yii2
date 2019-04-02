<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KaryawanStatus */

$this->title = 'Update Karyawan Status: ' . $model->id_status_karyawan;
$this->params['breadcrumbs'][] = ['label' => 'Karyawan Status', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_status_karyawan, 'url' => ['view', 'id' => $model->id_status_karyawan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="table-responsive karyawan-status-update">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
        'id_karyawan' => $id_karyawan
    ]); ?>

</div>
