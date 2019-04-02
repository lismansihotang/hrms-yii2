<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JenisIdentitas */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="jenis-identitas-form">
    <?php
    $form = ActiveForm::begin();
    echo $form->field($model, 'nm_jenis_identitas')->textInput(['maxlength' => true]);
    ?>    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? '<span class="glyphicon btn-glyphicon glyphicon-floppy-saved img-circle text-muted"></span>Create' : '<span class="glyphicon btn-glyphicon glyphicon-floppy-saved img-circle text-muted"></span>Update', ['class' => $model->isNewRecord ? 'btn icon-btn btn-success' : 'btn icon-btn btn-primary']); ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
