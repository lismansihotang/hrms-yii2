<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PenggajianKaryawanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penggajian-karyawan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pk') ?>

    <?= $form->field($model, 'id_penggajian') ?>

    <?= $form->field($model, 'id_karyawan') ?>

    <?= $form->field($model, 'pendapatan') ?>

    <?= $form->field($model, 'potongan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
