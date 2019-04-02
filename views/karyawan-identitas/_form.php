<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\InformasiPribadi;
use app\models\JenisIdentitas;

/* @var $this yii\web\View */
/* @var $model app\models\KaryawanIdentitas */
/* @var $form yii\widgets\ActiveForm */
/* @var $id_karyawan */
?>
<div class="karyawan-identitas-form">
    <?php
    $form = ActiveForm::begin();
    if ($id_karyawan !== null) {
        echo $form->field($model, 'id_karyawan')->hiddenInput(['value' => $id_karyawan])->label(false);
    } else {
        echo $form->field($model, 'id_karyawan')->widget(
                Select2::className(), [
            'data' => ArrayHelper::map(InformasiPribadi::find()->all(), 'id_karyawan', 'nama'),
            'options' => ['placeholder' => 'Pilih Nama Karyawan...'],
            'pluginOptions' => ['allowClear' => true],
                ]
        );
    }
    echo $form->field($model, 'no_identitas')->textInput(['maxlength' => true]);
    echo $form->field($model, 'id_jenis_identitas')->widget(
            Select2::className(), [
        'data' => ArrayHelper::map(JenisIdentitas::find()->all(), 'id_jenis_identitas', 'nm_jenis_identitas'),
        'options' => ['placeholder' => 'Pilih Jenis Identitas...'],
        'pluginOptions' => ['allowClear' => true],
            ]
    );
    ?>
    <div class="form-group">
    <?php echo Html::submitButton($model->isNewRecord ? '<span class="glyphicon btn-glyphicon glyphicon-floppy-saved img-circle text-muted"></span>Create' : '<span class="glyphicon btn-glyphicon glyphicon-floppy-saved img-circle text-muted"></span>Update', ['class' => $model->isNewRecord ? 'btn icon-btn btn-success' : 'btn icon-btn btn-primary']); ?>
    </div>
        <?php ActiveForm::end(); ?>
</div>
