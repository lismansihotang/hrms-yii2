<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\LogAbsensi */
/* @var $form yii\widgets\ActiveForm */
/* @var $karyawan */
?>
<div class="log-absensi-form">
    <?php
    $form = ActiveForm::begin();
    #echo $form->field($model, 'log_match_id')->textInput();
    echo $form->field($model, 'log_finger_id')->widget(
            Select2::className(), [
        'data' => ArrayHelper::map($karyawan, 'log_finger_id', 'nama'),
        'options' => ['placeholder' => 'Pilih Karyawan...'],
        'pluginOptions' => ['allowClear' => true],
            ]
    );
    echo $form->field($model, 'log_fulldate')->widget(
            DateTimePicker::className(), [
        'options' => ['placeholder' => 'Pilih Tanggal ...'],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]);
    echo $form->field($model, 'log_type')->textInput(['value' => '1']);
    echo $form->field($model, 'log_date')->widget(
            DatePicker::className(), [
        'options' => ['placeholder' => 'Pilih Tanggal Absensi'],
        'pluginOptions' => ['autoClose' => true, 'format' => 'yyyy-mm-dd'],
            ]
    );
    echo $form->field($model, 'log_time')->widget(
            DateTimePicker::className(), [
        'options' => ['placeholder' => 'Pilih Jam ...'],
        'value' => date('H:i:s'),
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'hh:ii:ss'
        ]
    ]);
    ?>
    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? '<span class="glyphicon btn-glyphicon glyphicon-floppy-saved img-circle text-muted"></span>Create' : '<span class="glyphicon btn-glyphicon glyphicon-floppy-saved img-circle text-muted"></span>Update', ['class' => $model->isNewRecord ? 'btn icon-btn btn-success' : 'btn icon-btn btn-primary']); ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
