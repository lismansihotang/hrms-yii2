<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Perusahaan;
use app\models\Jabatan;
use app\models\Status;
use kartik\date\DatePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Karyawan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="karyawan-form">

    <?php
    $form = ActiveForm::begin();
    echo $form->field($model, 'nik')->textInput(['maxlength' => true]);
    echo $form->field($model, 'id_status')->widget(
            Select2::className(), [
        'data' => ArrayHelper::map(Status::find()->all(), 'id_status', 'nm_status'),
        'options' => ['placeholder' => 'Pilih Status Karyawan...'],
        'pluginOptions' => ['allowClear' => true],
            ]
    );
    echo $form->field($model, 'id_perusahaan')->widget(
            Select2::className(), [
        'data' => ArrayHelper::map(Perusahaan::find()->all(), 'id', 'nm_pt'),
        'options' => ['placeholder' => 'Pilih Perusahaan...'],
        'pluginOptions' => ['allowClear' => true],
            ]
    );
    echo $form->field($model, 'id_jabatan')->widget(
            Select2::className(), [
        'data' => ArrayHelper::map(Jabatan::find()->all(), 'id', 'nm_jabatan'),
        'options' => ['placeholder' => 'Pilih Jabatan...'],
        'pluginOptions' => ['allowClear' => true],
            ]
    );
    echo $form->field($model, 'tgl_bergabung')->widget(
            DatePicker::className(), [
        'options' => ['placeholder' => 'Pilih Tanggal Mulai Bergabung', 'value' => date('Y-m-d')],
        'pluginOptions' => ['autoClose' => true, 'format' => 'yyyy-mm-dd'],
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
