<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KaryawanIdentitasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="karyawan-identitas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_identitas') ?>

    <?= $form->field($model, 'id_karyawan') ?>

    <?= $form->field($model, 'no_identitas') ?>

    <?= $form->field($model, 'id_jenis_identitas') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
