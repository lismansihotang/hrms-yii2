<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PenggajianKaryawan */

$this->title = 'Update Penggajian Karyawan: ' . $model->id_pk;
$this->params['breadcrumbs'][] = ['label' => 'Penggajian Karyawans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pk, 'url' => ['view', 'id' => $model->id_pk]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="penggajian-karyawan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
