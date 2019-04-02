<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KomponenGajiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="komponen-gaji-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_komponen') ?>

    <?= $form->field($model, 'nm_komponen') ?>

    <?= $form->field($model, 'kategori_komponen') ?>

    <?= $form->field($model, 'tipe') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
