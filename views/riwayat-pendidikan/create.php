<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RiwayatPendidikan */

$this->title = 'Create Riwayat Pendidikan';
$this->params['breadcrumbs'][] = ['label' => 'Riwayat Pendidikan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="riwayat-pendidikan-create">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render('_form', ['model' => $model, 'id_karyawan' => $id_karyawan]); ?>

</div>
