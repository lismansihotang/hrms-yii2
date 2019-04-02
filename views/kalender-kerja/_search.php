<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KalenderKerjaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kalender-kerja-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_kalender') ?>

    <?= $form->field($model, 'bulan') ?>

    <?= $form->field($model, 'thn') ?>

    <?= $form->field($model, 'hari_kerja') ?>

    <?= $form->field($model, 'libur') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
