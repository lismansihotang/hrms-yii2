<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PenggajianKaryawanDetail */

$this->title = 'Create Penggajian Karyawan Detail';
$this->params['breadcrumbs'][] = ['label' => 'Penggajian Karyawan Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penggajian-karyawan-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
