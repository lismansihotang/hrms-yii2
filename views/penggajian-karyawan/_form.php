<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PenggajianKaryawan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penggajian-karyawan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_penggajian')->textInput() ?>

    <?= $form->field($model, 'id_karyawan')->textInput() ?>

    <?= $form->field($model, 'pendapatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'potongan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
