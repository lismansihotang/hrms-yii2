<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KaryawanInventarisSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="karyawan-inventaris-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_inventaris') ?>

    <?= $form->field($model, 'id_karyawan') ?>

    <?= $form->field($model, 'tgl_inventaris') ?>

    <?= $form->field($model, 'tgl_terima') ?>

    <?= $form->field($model, 'tgl_kembali') ?>

    <?php // echo $form->field($model, 'id_barang_inventaris') ?>

    <?php // echo $form->field($model, 'jml') ?>

    <?php // echo $form->field($model, 'ket') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
