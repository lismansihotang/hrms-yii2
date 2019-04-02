<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PenggajianKaryawanDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penggajian-karyawan-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pk')->textInput() ?>

    <?= $form->field($model, 'id_komponen')->textInput() ?>

    <?= $form->field($model, 'jumlah')->textInput() ?>

    <?= $form->field($model, 'nominal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subtotal')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
