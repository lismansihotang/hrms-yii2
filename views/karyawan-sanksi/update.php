<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KaryawanSanksi */
/* @var $id_karyawan */

$this->title = 'Update Karyawan Sanksi: ' . $model->id_sanksi;
$this->params['breadcrumbs'][] = ['label' => 'Karyawan Sanksi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sanksi, 'url' => ['view', 'id' => $model->id_sanksi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="table-responsive karyawan-sanksi-update">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
        'id_karyawan' => $id_karyawan
    ]); ?>

</div>
