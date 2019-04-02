<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LogAbsensi */

$this->title = 'Create Absensi';
$this->params['breadcrumbs'][] = ['label' => 'Absensi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-absensi-create">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', ['model' => $model, 'karyawan' => $karyawan]); ?>

</div>
