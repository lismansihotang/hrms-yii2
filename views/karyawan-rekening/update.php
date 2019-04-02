<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KaryawanRekening */
/* @var $id_karyawan */

$this->title = 'Update Karyawan Rekening: ' . $model->id_rekening;
$this->params['breadcrumbs'][] = ['label' => 'Karyawan Rekening', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_rekening, 'url' => ['view', 'id' => $model->id_rekening]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="table-responsive karyawan-rekening-update">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
        'id_karyawan' => $id_karyawan
    ]); ?>

</div>
