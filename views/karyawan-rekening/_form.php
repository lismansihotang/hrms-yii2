<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\InformasiPribadi;
use app\models\Bank;

/* @var $this yii\web\View */
/* @var $model app\models\KaryawanRekening */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="karyawan-rekening-form">
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
    echo $form->field($model, 'id_bank')->widget(
            Select2::className(), [
        'data' => ArrayHelper::map(Bank::find()->all(), 'id_bank', 'nm_bank'),
        'options' => ['placeholder' => 'Pilih Bank...'],
        'pluginOptions' => ['allowClear' => true],
            ]
    );
    echo $form->field($model, 'no_rek')->textInput(['maxlength' => true]);
    echo $form->field($model, 'nm_pemilik_rek')->textInput(['maxlength' => true]);
    ?>
    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? '<span class="glyphicon btn-glyphicon glyphicon-floppy-saved img-circle text-muted"></span>Create' : '<span class="glyphicon btn-glyphicon glyphicon-floppy-saved img-circle text-muted"></span>Update', ['class' => $model->isNewRecord ? 'btn icon-btn btn-success' : 'btn icon-btn btn-primary']); ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
