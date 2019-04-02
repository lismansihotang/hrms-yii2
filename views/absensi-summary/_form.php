<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AbsensiSummary */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="absensi-summary-form">
    <?php 

$form = ActiveForm::begin();
        echo $form->field($model, 'id_penggajian')->textInput(); 

    echo $form->field($model, 'id_karyawan')->textInput(); 

    echo $form->field($model, 'tgl')->textInput(); 

    echo $form->field($model, 'bulan')->dropDownList([ 'Januari' => 'Januari', 'Februari' => 'Februari', 'Maret' => 'Maret', 'April' => 'April', 'Mei' => 'Mei', 'Juni' => 'Juni', 'Juli' => 'Juli', 'Agustus' => 'Agustus', 'September' => 'September', 'Oktober' => 'Oktober', 'November' => 'November', 'Desember' => 'Desember', ], ['prompt' => '']); 

    echo $form->field($model, 'tahun')->textInput(['maxlength' => true]); 

    echo $form->field($model, 'hadir')->textInput(); 

    echo $form->field($model, 'absen')->textInput(); 

    echo $form->field($model, 'cuti')->textInput(); 

    echo $form->field($model, 'sakit')->textInput(); 

    echo $form->field($model, 'ijin')->textInput(); 

    echo $form->field($model, 'lain')->textInput(); 

 ?>    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
