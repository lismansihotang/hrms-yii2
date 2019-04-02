<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\InformasiPribadi;
use app\models\TempatPendidikan;
use app\models\Pendidikan;

/* @var $this yii\web\View */
/* @var $model app\models\RiwayatPendidikan */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="riwayat-pendidikan-form">
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
    echo $form->field($model, 'id_pendidikan')->widget(
            Select2::className(), [
        'data' => ArrayHelper::map(Pendidikan::find()->all(), 'id_pendidikan', 'nm_pendidikan'),
        'options' => ['placeholder' => 'Pilih Pendidikan...'],
        'pluginOptions' => ['allowClear' => true],
            ]
    );
    echo $form->field($model, 'id_tmpt_pendidikan')->widget(
            Select2::className(), [
        'data' => ArrayHelper::map(TempatPendidikan::find()->all(), 'id_tp', 'nm_tmpt'),
        'options' => ['placeholder' => 'Pilih Tempat Pendidikan...'],
        'pluginOptions' => ['allowClear' => true],
            ]
    );
    echo $form->field($model, 'thn_lulus')->textInput(['maxlength' => true]);
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
