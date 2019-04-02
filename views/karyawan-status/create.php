<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KaryawanStatus */
/* @var $id_karyawan */

$this->title = 'Create Karyawan Status';
$this->params['breadcrumbs'][] = ['label' => 'Karyawan Status', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-responsive karyawan-status-create">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', ['model' => $model, 'id_karyawan' => $id_karyawan]); ?>

</div>
