<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KaryawanFile */
/* @var $id_karyawan */

$this->title = 'Create Karyawan File';
$this->params['breadcrumbs'][] = ['label' => 'Karyawan File', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-responsive karyawan-file-create">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', ['model' => $model, 'id_karyawan' => $id_karyawan]); ?>

</div>
