<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\VKaryawan;
use app\models\TipeShift;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Shift */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shift-form">

    <?php
    $form = ActiveForm::begin();
    echo $form->field($model, 'id_karyawan')->widget(
        Select2::className(),
        [
            'data'          => ArrayHelper::map(VKaryawan::find()->all(), 'id_karyawan', 'nama'),
            'options'       => ['placeholder' => 'Pilih Karyawan...'],
            'pluginOptions' => ['allowClear' => true],
        ]
    );
    echo $form->field($model, 'id_tipe_shift')->widget(
        Select2::className(),
        [
            'data'          => ArrayHelper::map(TipeShift::find()->all(), 'id_tipe_shift', 'nm_shift'),
            'options'       => ['placeholder' => 'Pilih Tipe Shift...'],
            'pluginOptions' => ['allowClear' => true],
        ]
    );
    echo $form->field($model, 'jam_mulai')->textInput();
    echo $form->field($model, 'jam_berakhir')->textInput(); ?>

    <div class="form-group">
        <?php echo Html::submitButton(
            $model->isNewRecord ? 'Create' : 'Update',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
        ); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
