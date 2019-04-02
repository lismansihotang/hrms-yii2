<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\VKaryawan;
use app\models\KomponenGaji;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\KomponenGajiKaryawan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="komponen-gaji-karyawan-form">

    <?php
    $form = ActiveForm::begin();
    if ($id_karyawan !== null) {
        echo $form->field($model, 'id_karyawan')->hiddenInput(['value' => $id_karyawan])->label(false);
        echo '<h2>' . $id_karyawan . '</h2>';
    } else {
        echo $form->field($model, 'id_karyawan')->widget(
                Select2::className(), [
            'data' => ArrayHelper::map(VKaryawan::find()->all(), 'id_karyawan', 'nama'),
            'options' => ['placeholder' => 'Pilih Karyawan...'],
            'pluginOptions' => ['allowClear' => true],
                ]
        );
    }
    echo $form->field($model, 'id_komponen')->widget(
            Select2::className(), [
        'data' => ArrayHelper::map(KomponenGaji::find()->all(), 'id_komponen', 'nm_komponen'),
        'options' => ['placeholder' => 'Pilih Komponen...'],
        'pluginOptions' => ['allowClear' => true],
            ]
    );
    echo $form->field($model, 'nominal')->textInput(['maxlength' => true]);
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
