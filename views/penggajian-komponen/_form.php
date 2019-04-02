<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PenggajianKomponen */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="penggajian-komponen-form">
    <?php 

$form = ActiveForm::begin();
        echo $form->field($model, 'id_penggajian')->textInput(); 

    echo $form->field($model, 'id_komponen')->textInput(); 

 ?>    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
