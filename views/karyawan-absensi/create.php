<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KaryawanAbsensi */

$this->title = 'Create Karyawan Absensi';
$this->params['breadcrumbs'][] = ['label' => 'Karyawan Absensi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-responsive karyawan-absensi-create">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', ['model' => $model,]); ?>

</div>
