<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CutiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cuti-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_cuti') ?>

    <?= $form->field($model, 'id_karyawan') ?>

    <?= $form->field($model, 'id_tipe_cuti') ?>

    <?= $form->field($model, 'tgl_mulai_cuti') ?>

    <?= $form->field($model, 'tgl_berakhir_cuti') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
