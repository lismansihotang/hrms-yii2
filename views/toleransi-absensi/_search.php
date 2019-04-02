<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ToleransiAbsensiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="toleransi-absensi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_tolernasi') ?>

    <?= $form->field($model, 'id_tipe_absensi') ?>

    <?= $form->field($model, 'tahun') ?>

    <?= $form->field($model, 'jml') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
