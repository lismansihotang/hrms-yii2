<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\TipeAbsensi;

/* @var $this yii\web\View */
/* @var $model app\models\ToleransiAbsensi */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="toleransi-absensi-form">
    <?php
    $form = ActiveForm::begin();
    echo $form->field($model, 'id_tipe_absensi')->widget(Select2::className(), [
        'data' => ArrayHelper::map(TipeAbsensi::find()->all(), 'id_tipe_absensi', 'nm_tipe_absensi'),
        'options' => ['placeholder' => 'Pilih Tipe Absensi...'],
        'pluginOptions' => ['allowClear' => true],
    ]);
    echo $form->field($model, 'tahun')->textInput(['maxlength' => true]);
    echo $form->field($model, 'jml')->textInput();
    ?>    <div class="form-group">
        <?php
        echo Html::submitButton($model->isNewRecord ? '<span class="glyphicon btn-glyphicon glyphicon-floppy-saved img-circle text-muted"></span>Create' : '<span class="glyphicon btn-glyphicon glyphicon-floppy-saved img-circle text-muted"></span>Update', ['class' => $model->isNewRecord ? 'btn icon-btn btn-success' : 'btn icon-btn btn-primary']);
        ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
