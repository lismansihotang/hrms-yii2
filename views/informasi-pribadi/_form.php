<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\VKaryawan;
use kartik\select2\Select2;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\InformasiPribadi */
/* @var $form yii\widgets\ActiveForm */
/* @var $id_karyawan */
?>

<div class="informasi-pribadi-form">
    <?php
    $form = ActiveForm::begin();
    if ($id_karyawan !== null) {
        echo $form->field($model, 'id_karyawan')->hiddenInput(['value' => $id_karyawan])->label(false);
        echo '<h2>' . $id_karyawan . '</h2>';
    } else {
        echo $form->field($model, 'id_karyawan')->widget(
                Select2::className(), [
            'data' => ArrayHelper::map(VKaryawan::find()->all(), 'id_karyawan', 'nama'),
            'options' => ['placeholder' => 'Pilih Karyawan...'],
            'pluginOptions' => ['allowClear' => true],
                ]
        );
    }
    echo $form->field($model, 'nama')->textInput(['maxlength' => true]);
    echo $form->field($model, 'panggilan')->textInput(['maxlength' => true]);
    echo $form->field($model, 'tmp_lahir')->textInput(['maxlength' => true]);
    echo $form->field($model, 'tgl_lahir')->widget(
            DatePicker::className(), [
        'options' => ['placeholder' => 'Pilih Tanggal Lahir', 'value' => date('Y-m-d')],
        'pluginOptions' => ['autoClose' => true, 'format' => 'yyyy-mm-dd'],
            ]
    );
    echo $form->field($model, 'jk')->widget(Select2::className(), [
        'data' => ['Male' => 'Male', 'Female' => 'Female'],
        'options' => ['placeholder' => 'Pilih Jenis Kelamin...'],
        'pluginOptions' => ['allowClear' => true],
    ]);
    echo $form->field($model, 'status_menikah')->widget(Select2::className(), [
        'data' => ['Menikah' => 'Menikah', 'Belum Menikah' => 'Belum Menikah'],
        'options' => ['placeholder' => 'Pilih Status Menikah...'],
        'pluginOptions' => ['allowClear' => true],
    ]);
    echo $form->field($model, 'alamat')->textarea(['rows' => 6]);
    echo $form->field($model, 'no_telp')->textInput(['maxlength' => true]);
    echo $form->field($model, 'email')->textInput(['maxlength' => true]);
    echo $form->field($model, 'status_rumah')->widget(Select2::className(), [
        'data' => ['Sewa' => 'Sewa', 'Milik Sendiri' => 'Milik Sendiri'],
        'options' => ['placeholder' => 'Pilih Status Tempat Tinggal...'],
        'pluginOptions' => ['allowClear' => true],
    ]);
    echo Html::submitButton(
            $model->isNewRecord ? '<span class="glyphicon btn-glyphicon glyphicon-floppy-saved img-circle text-muted"></span>Create' : '<span class="glyphicon btn-glyphicon glyphicon-floppy-saved img-circle text-muted"></span>Update', ['class' => $model->isNewRecord ? 'btn icon-btn btn-success' : 'btn icon-btn btn-primary']
    );
    ActiveForm::end();
    ?>
</div>
