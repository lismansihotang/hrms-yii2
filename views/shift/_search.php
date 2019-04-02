<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ShiftSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shift-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_shift') ?>

    <?= $form->field($model, 'id_karyawan') ?>

    <?= $form->field($model, 'id_tipe_shift') ?>

    <?= $form->field($model, 'jam_mulai') ?>

    <?= $form->field($model, 'jam_berakhir') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
