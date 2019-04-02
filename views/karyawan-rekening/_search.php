<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KaryawanRekeningSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="karyawan-rekening-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_rekening') ?>

    <?= $form->field($model, 'id_karyawan') ?>

    <?= $form->field($model, 'id_bank') ?>

    <?= $form->field($model, 'no_rek') ?>

    <?= $form->field($model, 'nm_pemilik_rek') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
