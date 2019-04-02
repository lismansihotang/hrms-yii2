<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RiwayatPendidikan */

$this->title = 'Update Riwayat Pendidikan: ' . $model->id_rp;
$this->params['breadcrumbs'][] = ['label' => 'Riwayat Pendidikan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_rp, 'url' => ['view', 'id' => $model->id_rp]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="riwayat-pendidikan-update">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
        'id_karyawan' => $id_karyawan
    ]); ?>

</div>
