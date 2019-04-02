<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\file\FileInput;
use yii\bootstrap\Alert;

$form = ActiveForm::begin(
                [
                    'method' => 'post',
                    'action' => 'index.php?r=log-absensi/import-absensi',
                    'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data']
                ]
);
if (Yii::$app->session->hasFlash('warning-payroll') === true) {
    Alert::begin(
            [
                'options' => ['class' => 'alert-danger'],
                'body' => Yii::$app->session->getFlash('warning-payroll')
            ]
    );
    Alert::end();
    Yii::$app->session->removeFlash('warning-payroll');
}
if (Yii::$app->session->hasFlash('msg-payroll') === true) {
    Alert::begin(
            [
                'options' => ['class' => 'alert-info'],
                'body' => Yii::$app->session->getFlash('msg-payroll')
            ]
    );
    Alert::end();
    Yii::$app->session->removeFlash('msg-payroll');
}
?>
<div class="form-import-absensi">
    <h1>Import Absensi</h1>
    <?php
    echo $form->field($model, 'fileXls')->widget(
            FileInput::classname(), [
        'options' => ['accept' => 'application/*']
    ]);
    ?>
</div>
<?php
echo Html::submitButton('<span class="glyphicon btn-glyphicon glyphicon-file img-circle text-muted"></span>Import Data', ['class' => 'btn icon-btn btn-success']);
ActiveForm::end();
