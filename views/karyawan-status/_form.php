<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use app\models\InformasiPribadi;
use app\models\Status;

/* @var $this yii\web\View */
/* @var $model app\models\KaryawanStatus */
/* @var $form yii\widgets\ActiveForm */
/* @var $id_karyawan */
?>
<div class="karyawan-status-form">
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
    echo $form->field($model, 'id_status')->widget(
            Select2::className(), [
        'data' => ArrayHelper::map(Status::find()->all(), 'id_status', 'nm_status'),
        'options' => ['placeholder' => 'Pilih Status Karyawan...'],
        'pluginOptions' => ['allowClear' => true],
            ]
    );
    echo $form->field($model, 'tgl_status')->widget(
            DatePicker::className(), [
        'options' => ['placeholder' => 'Pilih Tgl Status', 'value' => date('Y-m-d')],
        'pluginOptions' => ['autoClose' => true, 'format' => 'yyyy-mm-dd'],
            ]
    );
    echo $form->field($model, 'tgl_berlaku')->widget(
            DatePicker::className(), [
        'options' => ['placeholder' => 'Pilih Tgl Berlaku', 'value' => date('Y-m-d')],
        'pluginOptions' => ['autoClose' => true, 'format' => 'yyyy-mm-dd'],
            ]
    );
    echo $form->field($model, 'tgl_berakhir')->widget(
            DatePicker::className(), [
        'options' => ['placeholder' => 'Pilih Tgl Berakhir', 'value' => date('Y-m-d')],
        'pluginOptions' => ['autoClose' => true, 'format' => 'yyyy-mm-dd'],
            ]
    );

    echo Html::submitButton($model->isNewRecord ? '<span class="glyphicon btn-glyphicon glyphicon-floppy-saved img-circle text-muted"></span>Create' : '<span class="glyphicon btn-glyphicon glyphicon-floppy-saved img-circle text-muted"></span>Update', ['class' => $model->isNewRecord ? 'btn icon-btn btn-success' : 'btn icon-btn btn-primary']);
    ActiveForm::end();
    ?>
</div>
