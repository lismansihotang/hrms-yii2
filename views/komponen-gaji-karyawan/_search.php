<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KomponenGajiKaryawanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="komponen-gaji-karyawan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_kgk') ?>

    <?= $form->field($model, 'id_karyawan') ?>

    <?= $form->field($model, 'id_komponen') ?>

    <?= $form->field($model, 'nominal') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
