<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KaryawanDepartemen */

$this->title = 'Create Karyawan Departemen';
$this->params['breadcrumbs'][] = ['label' => 'Karyawan Departeman', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-responsive karyawan-departemen-create">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', ['model' => $model,'id_karyawan' => $id_karyawan]); ?>

</div>
