<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KaryawanSanksiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="karyawan-sanksi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_sanksi') ?>

    <?= $form->field($model, 'id_karyawan') ?>

    <?= $form->field($model, 'id_jenis_sanksi') ?>

    <?= $form->field($model, 'tgl_sanksi') ?>

    <?= $form->field($model, 'tgl_berlaku') ?>

    <?php // echo $form->field($model, 'tgl_berakhir') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
