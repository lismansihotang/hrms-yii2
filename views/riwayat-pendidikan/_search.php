<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RiwayatPendidikanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="riwayat-pendidikan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_rp') ?>

    <?= $form->field($model, 'id_karyawan') ?>

    <?= $form->field($model, 'id_pendidikan') ?>

    <?= $form->field($model, 'id_tmpt_pendidikan') ?>

    <?= $form->field($model, 'thn_lulus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
