<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\KalenderLibur */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="kalender-libur-form">
    <?php
    $form = ActiveForm::begin();
    echo $form->field($model, 'thn_libur')->textInput(['maxlength' => true]);

    echo $form->field($model, 'tgl_libur')->widget(DatePicker::className(), [
        'options' => ['placeholder' => 'Pilih Tgl', 'value' => date('Y-m-d')],
        'pluginOptions' => ['autoClose' => true, 'format' => 'yyyy-mm-dd'],
    ]);
    ?>    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? '<span class="glyphicon btn-glyphicon glyphicon-floppy-saved img-circle text-muted"></span>Create' : '<span class="glyphicon btn-glyphicon glyphicon-floppy-saved img-circle text-muted"></span>Update', ['class' => $model->isNewRecord ? 'btn icon-btn btn-success' : 'btn icon-btn btn-primary']); ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
