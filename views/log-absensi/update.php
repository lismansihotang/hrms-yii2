<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LogAbsensi */

$this->title = 'Update Log Absensi: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Log Absensi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="log-absensi-update">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
        'karyawan' => $karyawan
    ]); ?>

</div>
