<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\VKaryawan;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\SysUser */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="sys-user-form">
    <?php
    $form = ActiveForm::begin();
    #echo $form->field($model, 'number_id')->textInput(['maxlength' => true]);
    echo $form->field($model, 'user_name')->widget(
            Select2::className(), [
        'data' => ArrayHelper::map(VKaryawan::find()->all(), 'nik', 'nama'),
        'options' => ['placeholder' => 'Pilih Karyawan...'],
        'pluginOptions' => ['allowClear' => true],
            ]
    );
    echo $form->field($model, 'user_pass')->passwordInput(['maxlength' => true]);
    #echo $form->field($model, 'auth_key')->textInput(['maxlength' => true]);
    #echo $form->field($model, 'auth_token')->textInput(['maxlength' => true]);
    #echo $form->field($model, 'pass_reset')->textInput(['maxlength' => true]);
    #echo $form->field($model, 'pass_generated')->textInput(['maxlength' => true]);
    echo $form->field($model, 'tipe_user')->widget(
            Select2::className(), [
        'data' => ['Karyawan' => 'Karyawan', 'Admin' => 'Admin',],
        'options' => ['placeholder' => 'Pilih Tipe Pengguna...'],
        'pluginOptions' => ['allowClear' => true],
            ]
    );
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
