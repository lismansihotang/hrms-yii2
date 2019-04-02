<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KaryawanKeluargaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="karyawan-keluarga-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_keluarga') ?>

    <?= $form->field($model, 'id_karyawan') ?>

    <?= $form->field($model, 'id_hub_keluarga') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'tgl_lahir') ?>

    <?php // echo $form->field($model, 'tmp_lahir') ?>

    <?php // echo $form->field($model, 'jk') ?>

    <?php // echo $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'no_telp') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'id_pendidikan') ?>

    <?php // echo $form->field($model, 'id_pekerjaan') ?>

    <?php // echo $form->field($model, 'id_penghasilan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
