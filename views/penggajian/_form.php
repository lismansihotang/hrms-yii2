<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Perusahaan;
use kartik\select2\Select2;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Penggajian */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penggajian-form">

    <?php
    $form = ActiveForm::begin();
    echo $form->field($model, 'tgl')->widget(
            DatePicker::className(), [
        'options' => ['placeholder' => 'Pilih Tanggal Penggajian', 'value' => date('Y-m-d')],
        'pluginOptions' => ['autoClose' => true, 'format' => 'yyyy-mm-dd'],
            ]
    );
    echo $form->field($model, 'tgl_awal')->widget(
            DatePicker::className(), [
        'options' => ['placeholder' => 'Pilih Tanggal Awal Cut Off', 'value' => date('Y-m-d')],
        'pluginOptions' => ['autoClose' => true, 'format' => 'yyyy-mm-dd'],
            ]
    );
    echo $form->field($model, 'tgl_akhir')->widget(
            DatePicker::className(), [
        'options' => ['placeholder' => 'Pilih Tanggal Akhir Cut Off', 'value' => date('Y-m-d')],
        'pluginOptions' => ['autoClose' => true, 'format' => 'yyyy-mm-dd'],
            ]
    );
    echo $form->field($model, 'id_perusahaan')->widget(
            Select2::className(), [
        'data' => ArrayHelper::map(Perusahaan::find()->all(), 'id', 'nm_pt'),
        'options' => ['placeholder' => 'Pilih Perusahaan...'],
        'pluginOptions' => ['allowClear' => true],
            ]
    );
    echo $form->field($model, 'bulan')->widget(
            Select2::className(), [
        'data' => [
            'Januari' => 'Januari',
            'Februari' => 'Februari',
            'Maret' => 'Maret',
            'April' => 'April',
            'Mei' => 'Mei',
            'Juni' => 'Juni',
            'Juli' => 'Juli',
            'Agustus' => 'Agustus',
            'September' => 'September',
            'Oktober' => 'Oktober',
            'November' => 'November',
            'Desember' => 'Desember',
        ],
        'options' => ['placeholder' => 'Pilih Bulan...'],
        'pluginOptions' => ['allowClear' => true],
            ]
    );
    echo $form->field($model, 'tahun')->textInput(['maxlength' => true, 'value' => date('Y')]);
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
