<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KaryawanKarir */
/* @var $id_karyawan */

$this->title = 'Update Karyawan Karir: ' . $model->id_karir;
$this->params['breadcrumbs'][] = ['label' => 'Karyawan Karir', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_karir, 'url' => ['view', 'id' => $model->id_karir]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="table-responsive karyawan-karir-update">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
        'id_karyawan' => $id_karyawan
    ]); ?>

</div>
