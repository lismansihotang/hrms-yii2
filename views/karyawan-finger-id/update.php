<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KaryawanFingerId */
/* @var $id_karyawan */

$this->title = 'Update Karyawan Finger : ' . $model->id_kfi;
$this->params['breadcrumbs'][] = ['label' => 'Karyawan Finger', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kfi, 'url' => ['view', 'id' => $model->id_kfi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="karyawan-finger-id-update">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
        'id_karyawan' => $id_karyawan
    ]); ?>

</div>
