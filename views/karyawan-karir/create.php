<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KaryawanKarir */
/* @var $id_karyawan */

$this->title = 'Create Karyawan Karir';
$this->params['breadcrumbs'][] = ['label' => 'Karyawan Karir', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-responsive karyawan-karir-create">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', ['model' => $model, 'id_karyawan' => $id_karyawan]); ?>

</div>
