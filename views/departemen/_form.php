<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Perusahaan;

/* @var $this yii\web\View */
/* @var $model app\models\Departemen */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="departemen-form">
    <?php
    $form = ActiveForm::begin();
    echo $form->field($model, 'id_perusahaan')->widget(
            Select2::className(), [
        'data' => ArrayHelper::map(Perusahaan::find()->all(), 'id', 'nm_pt'),
        'options' => ['placeholder' => 'Pilih Perusahaan...'],
        'pluginOptions' => ['allowClear' => true],
            ]
    );
    echo $form->field($model, 'singkatan')->textInput(['maxlength' => true]);
    echo $form->field($model, 'nm_dept')->textInput(['maxlength' => true]);
    ?>
    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? '<span class="glyphicon btn-glyphicon glyphicon-floppy-saved img-circle text-muted"></span>Create' : '<span class="glyphicon btn-glyphicon glyphicon-floppy-saved img-circle text-muted"></span>Update', ['class' => $model->isNewRecord ? 'btn icon-btn btn-success' : 'btn icon-btn btn-primary']); ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
