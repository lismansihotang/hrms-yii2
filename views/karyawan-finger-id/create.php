<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KaryawanFingerId */
/* @var $id_karyawan */

$this->title = 'Create Karyawan Finger';
$this->params['breadcrumbs'][] = ['label' => 'Karyawan Finger', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karyawan-finger-id-create">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', ['model' => $model,'id_karyawan'=>$id_karyawan]); ?>

</div>
