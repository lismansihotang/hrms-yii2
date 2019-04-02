<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KaryawanInventaris */
/* @var $id_karyawan */

$this->title = 'Create Karyawan Inventaris';
$this->params['breadcrumbs'][] = ['label' => 'Karyawan Inventari', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-responsive karyawan-inventaris-create">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', ['model' => $model, 'id_karyawan' => $id_karyawan]); ?>

</div>
