<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use app\models\InformasiPribadi;
use app\models\Pendidikan;
use app\models\Pekerjaan;
use app\models\Penghasilan;
use app\models\HubunganKeluarga;

/* @var $this yii\web\View */
/* @var $model app\models\KaryawanKeluarga */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="karyawan-keluarga-form">
    <?php
    $form = ActiveForm::begin();
    if ($id_karyawan !== null) {
        echo $form->field($model, 'id_karyawan')->hiddenInput(['value' => $id_karyawan])->label(false);
        echo '<h2>' . $id_karyawan . '</h2>';
    } else {
        echo $form->field($model, 'id_karyawan')->widget(
                Select2::className(), [
            'data' => ArrayHelper::map(InformasiPribadi::find()->all(), 'id_karyawan', 'nama'),
            'options' => ['placeholder' => 'Pilih Karyawan...'],
            'pluginOptions' => ['allowClear' => true],
                ]
        );
    }
    echo $form->field($model, 'id_hub_keluarga')->widget(
            Select2::className(), [
        'data' => ArrayHelper::map(HubunganKeluarga::find()->all(), 'id_hub_keluarga', 'nm_hub_keluarga'),
        'options' => ['placeholder' => 'Pilih Hubungan Keluarga...'],
        'pluginOptions' => ['allowClear' => true],
            ]
    );
    echo $form->field($model, 'nama')->textInput(['maxlength' => true]);
    echo $form->field($model, 'tmp_lahir')->textInput(['maxlength' => true]);
    echo $form->field($model, 'tgl_lahir')->widget(
            DatePicker::className(), [
        'options' => ['placeholder' => 'Pilih Tgl Lahir', 'value' => date('Y-m-d')],
        'pluginOptions' => ['autoClose' => true, 'format' => 'yyyy-mm-dd'],
            ]
    );
    echo $form->field($model, 'jk')->widget(Select2::className(), [
        'data' => ['Male' => 'Male', 'Female' => 'Female',],
        'options' => ['placeholder' => 'Pilih Jenis Kelamin...'],
        'pluginOptions' => ['allowClear' => true],
    ]);
    echo $form->field($model, 'alamat')->textarea(['rows' => 6]);
    echo $form->field($model, 'no_telp')->textInput(['maxlength' => true]);
    echo $form->field($model, 'email')->textInput(['maxlength' => true]);
    echo $form->field($model, 'id_pendidikan')->widget(
            Select2::className(), [
        'data' => ArrayHelper::map(Pendidikan::find()->all(), 'id_pendidikan', 'nm_pendidikan'),
        'options' => ['placeholder' => 'Pilih Pendidikan...'],
        'pluginOptions' => ['allowClear' => true],
            ]
    );
    echo $form->field($model, 'id_pekerjaan')->widget(
            Select2::className(), [
        'data' => ArrayHelper::map(Pekerjaan::find()->all(), 'id_pekerjaan', 'nm_pekerjaan'),
        'options' => ['placeholder' => 'Pilih Pekerjaan...'],
        'pluginOptions' => ['allowClear' => true],
            ]
    );
    echo $form->field($model, 'id_penghasilan')->widget(
            Select2::className(), [
        'data' => ArrayHelper::map(Penghasilan::find()->all(), 'id_penghasilan', 'range_penghasilan'),
        'options' => ['placeholder' => 'Pilih Penghasilan...'],
        'pluginOptions' => ['allowClear' => true],
            ]
    );

    echo Html::submitButton($model->isNewRecord ? '<span class="glyphicon btn-glyphicon glyphicon-floppy-saved img-circle text-muted"></span>Create' : '<span class="glyphicon btn-glyphicon glyphicon-floppy-saved img-circle text-muted"></span>Update', ['class' => $model->isNewRecord ? 'btn icon-btn btn-success' : 'btn icon-btn btn-primary']);
    ActiveForm::end();
    ?>
</div>
