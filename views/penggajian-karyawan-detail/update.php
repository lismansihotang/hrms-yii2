<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PenggajianKaryawanDetail */

$this->title = 'Update Penggajian Karyawan Detail: ' . $model->id_pkd;
$this->params['breadcrumbs'][] = ['label' => 'Penggajian Karyawan Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pkd, 'url' => ['view', 'id' => $model->id_pkd]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="penggajian-karyawan-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
