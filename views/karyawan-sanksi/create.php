<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KaryawanSanksi */
/* @var $id_karyawan */

$this->title = 'Create Karyawan Sanksi';
$this->params['breadcrumbs'][] = ['label' => 'Karyawan Sanksi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-responsive karyawan-sanksi-create">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', ['model' => $model,'id_karyawan'=>$id_karyawan]); ?>

</div>
