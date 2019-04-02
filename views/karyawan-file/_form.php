<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\InformasiPribadi;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\KaryawanFile */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="karyawan-file-form">
    <?php
    $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
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
    #echo $form->field($model, 'nm_file')->textInput(['maxlength' => true]);
    echo $form->field($model, 'image')->widget(
            FileInput::classname(), [
        'options' => ['accept' => 'image/*']
    ]);
    echo $form->field($model, 'is_active')->widget(Select2::className(), [
        'data' => [1 => '1. Ya', 0 => '2. -',],
        'options' => ['placeholder' => 'Pilih Active...'],
        'pluginOptions' => ['allowClear' => true],
    ]);
    ?>
    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? '<span class="glyphicon btn-glyphicon glyphicon-floppy-saved img-circle text-muted"></span>Create' : '<span class="glyphicon btn-glyphicon glyphicon-floppy-saved img-circle text-muted"></span>Update', ['class' => $model->isNewRecord ? 'btn icon-btn btn-success' : 'btn icon-btn btn-primary']); ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
