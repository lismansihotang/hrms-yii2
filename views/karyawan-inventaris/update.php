<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KaryawanInventaris */
/* @var $id_karyawan */

$this->title = 'Update Karyawan Inventaris: ' . $model->id_inventaris;
$this->params['breadcrumbs'][] = ['label' => 'Karyawan Inventari', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_inventaris, 'url' => ['view', 'id' => $model->id_inventaris]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="table-responsive karyawan-inventaris-update">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
        'id_karyawan' => $id_karyawan
    ]); ?>

</div>
