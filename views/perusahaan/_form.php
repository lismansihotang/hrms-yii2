<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Perusahaan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perusahaan-form">

    <?php
    $form = ActiveForm::begin();
    echo $form->field($model, 'nm_pt')->textInput(['maxlength' => true]);
    echo $form->field($model, 'alamat')->textarea(['rows' => 6]);
    echo $form->field($model, 'no_telp')->textInput(['maxlength' => true]);
    echo $form->field($model, 'no_fax')->textInput(['maxlength' => true]);
    echo $form->field($model, 'email')->textInput(['maxlength' => true]);
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
