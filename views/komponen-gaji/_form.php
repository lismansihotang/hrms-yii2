<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\KomponenGaji */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="komponen-gaji-form">

    <?php
    $form = ActiveForm::begin();
    echo $form->field($model, 'nm_komponen')->textInput(['maxlength' => true]);
    echo $form->field($model, 'kategori_komponen')->widget(
            Select2::className(), [
        'data' => ['Pendapatan' => 'Pendapatan', 'Potongan' => 'Potongan', 'Gaji Pokok' => 'Gaji Pokok'],
        'options' => ['placeholder' => 'Pilih Kategori...'],
        'pluginOptions' => ['allowClear' => true],
            ]
    );
    echo $form->field($model, 'tipe')->widget(
            Select2::className(), [
        'data' => ['-' => '-', 'Harian' => 'Harian', 'Bulanan' => 'Bulanan'],
        'options' => ['placeholder' => 'Pilih Tipe...'],
        'pluginOptions' => ['allowClear' => true],
            ]
    );
    ?>

    <div class="form-group">
        <?php
        echo Html::submitButton(
                $model->isNewRecord ? '<span class="glyphicon btn-glyphicon glyphicon-floppy-saved img-circle text-muted"></span>Create' : '<span class="glyphicon btn-glyphicon glyphicon-floppy-saved img-circle text-muted"></span>Update', ['class' => $model->isNewRecord ? 'btn icon-btn btn-success' : 'btn icon-btn btn-primary']
        );
        ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
