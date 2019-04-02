<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KaryawanKeluarga */
/* @var $id_karyawan */

$this->title = 'Update Karyawan Keluarga: ' . $model->id_keluarga;
$this->params['breadcrumbs'][] = ['label' => 'Karyawan Keluarga', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_keluarga, 'url' => ['view', 'id' => $model->id_keluarga]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="table-responsive karyawan-keluarga-update">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
        'id_karyawan' => $id_karyawan
    ]); ?>

</div>
