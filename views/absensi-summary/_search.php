<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AbsensiSummarySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="absensi-summary-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_penggajian') ?>

    <?= $form->field($model, 'id_karyawan') ?>

    <?= $form->field($model, 'tgl') ?>

    <?= $form->field($model, 'bulan') ?>

    <?php // echo $form->field($model, 'tahun') ?>

    <?php // echo $form->field($model, 'hadir') ?>

    <?php // echo $form->field($model, 'absen') ?>

    <?php // echo $form->field($model, 'cuti') ?>

    <?php // echo $form->field($model, 'sakit') ?>

    <?php // echo $form->field($model, 'ijin') ?>

    <?php // echo $form->field($model, 'lain') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
