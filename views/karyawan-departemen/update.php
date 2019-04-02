<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KaryawanDepartemen */
/* @var $id_karyawan */

$this->title = 'Update Karyawan Departemen: ' . $model->id_relasi;
$this->params['breadcrumbs'][] = ['label' => 'Karyawan Departeman', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_relasi, 'url' => ['view', 'id' => $model->id_relasi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="table-responsive karyawan-departemen-update">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
        'id_karyawan' => $id_karyawan
    ]); ?>

</div>
