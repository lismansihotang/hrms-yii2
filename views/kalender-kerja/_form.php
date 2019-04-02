<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\KalenderKerja */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="kalender-kerja-form">
    <?php
    $form = ActiveForm::begin();
    $arrBulan = [1 => '1 - Januari', 2 => '2 - Februari', 3 => '3- Maret', 4 => '4 - April', 5 => '5 - Mei',
        6 => '6 - Juni', 7 => '7 - Juli', 8 => '8 - Agustus', 9 => '9 - September', 10 => '10 - Oktober', 11 => '11 - November', 12 => '12 - Desember'];
    echo $form->field($model, 'bulan')->widget(Select2::className(), [
        'data' => $arrBulan,
        'options' => ['placeholder' => 'Pilih Bulan...'],
        'pluginOptions' => ['allowClear' => true],
    ]);
    echo $form->field($model, 'thn')->textInput(['maxlength' => true]);
    echo $form->field($model, 'hari_kerja')->textInput();
    echo $form->field($model, 'libur')->textInput();
    ?>    
    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? '<span class="glyphicon btn-glyphicon glyphicon-floppy-saved img-circle text-muted"></span>Create' : '<span class="glyphicon btn-glyphicon glyphicon-floppy-saved img-circle text-muted"></span>Update', ['class' => $model->isNewRecord ? 'btn icon-btn btn-success' : 'btn icon-btn btn-primary']); ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
