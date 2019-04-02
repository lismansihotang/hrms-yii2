<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use app\models\BarangInventaris;
use app\models\InformasiPribadi;

/* @var $this yii\web\View */
/* @var $model app\models\KaryawanInventaris */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="karyawan-inventaris-form">
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
    echo $form->field($model, 'tgl_inventaris')->widget(
            DatePicker::className(), [
        'options' => ['placeholder' => 'Pilih Tgl Inventaris', 'value' => date('Y-m-d')],
        'pluginOptions' => ['autoClose' => true, 'format' => 'yyyy-mm-dd'],
            ]
    );
    echo $form->field($model, 'id_barang_inventaris')->widget(
            Select2::className(), [
        'data' => ArrayHelper::map(BarangInventaris::find()->all(), 'id_barang_inventaris', 'nm_barang'),
        'options' => ['placeholder' => 'Pilih Barang Inventaris...'],
        'pluginOptions' => ['allowClear' => true],
            ]
    );
    echo $form->field($model, 'tgl_terima')->widget(
            DatePicker::className(), [
        'options' => ['placeholder' => 'Pilih Tgl Terima Barang', 'value' => date('Y-m-d')],
        'pluginOptions' => ['autoClose' => true, 'format' => 'yyyy-mm-dd'],
            ]
    );
    echo $form->field($model, 'tgl_kembali')->widget(
            DatePicker::className(), [
        'options' => ['placeholder' => 'Pilih Tgl Pengembalian Barang', 'value' => date('Y-m-d')],
        'pluginOptions' => ['autoClose' => true, 'format' => 'yyyy-mm-dd'],
            ]
    );
    echo $form->field($model, 'jml')->textInput();
    echo $form->field($model, 'ket')->textarea(['rows' => 6]);
    ?>
    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? '<span class="glyphicon btn-glyphicon glyphicon-floppy-saved img-circle text-muted"></span>Create' : '<span class="glyphicon btn-glyphicon glyphicon-floppy-saved img-circle text-muted"></span>Update', ['class' => $model->isNewRecord ? 'btn icon-btn btn-success' : 'btn icon-btn btn-primary']); ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
