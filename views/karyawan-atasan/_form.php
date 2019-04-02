<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\InformasiPribadi;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\KaryawanAtasan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="karyawan-atasan-form">

    <?php
    $form = ActiveForm::begin();
    echo $form->field($model, 'id_karyawan_atasan')->widget(
            Select2::className(), [
        'data' => ArrayHelper::map(InformasiPribadi::find()->all(), 'id_karyawan', 'nama'),
        'options' => ['placeholder' => 'Pilih Atasan Karyawan...'],
        'pluginOptions' => ['allowClear' => true],
            ]
    );
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
