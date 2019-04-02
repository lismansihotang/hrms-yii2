<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KaryawanIdentitas */
/* @var $id_karyawan */

$this->title = 'Update Karyawan Identitas: ' . $model->id_identitas;
$this->params['breadcrumbs'][] = ['label' => 'Karyawan Identita', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_identitas, 'url' => ['view', 'id' => $model->id_identitas]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="table-responsive karyawan-identitas-update">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model, 'id_karyawan' => $id_karyawan
    ]); ?>

</div>
