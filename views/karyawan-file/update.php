<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KaryawanFile */

$this->title = 'Update Karyawan File: ' . $model->id_file;
$this->params['breadcrumbs'][] = ['label' => 'Karyawan File', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_file, 'url' => ['view', 'id' => $model->id_file]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="table-responsive karyawan-file-update">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]); ?>

</div>
