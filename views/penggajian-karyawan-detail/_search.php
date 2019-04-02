<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PenggajianKaryawanDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penggajian-karyawan-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pkd') ?>

    <?= $form->field($model, 'id_pk') ?>

    <?= $form->field($model, 'id_komponen') ?>

    <?= $form->field($model, 'jumlah') ?>

    <?= $form->field($model, 'nominal') ?>

    <?php // echo $form->field($model, 'subtotal') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
