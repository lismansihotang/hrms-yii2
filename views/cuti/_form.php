<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\VKaryawan;
use app\models\TipeCuti;
use kartik\date\DatePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Cuti */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cuti-form">

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
    echo $form->field($model, 'id_tipe_cuti')->widget(
        Select2::className(),
        [
            'data'          => ArrayHelper::map(TipeCuti::find()->all(), 'id_tipe_cuti', 'nm_tipe_cuti'),
            'options'       => ['placeholder' => 'Pilih Tipe Cuti...'],
            'pluginOptions' => ['allowClear' => true],
        ]
    );
    echo $form->field($model, 'tgl_mulai_cuti')->widget(
        DatePicker::className(),
        [
            'options'       => ['placeholder' => 'Pilih Tanggal Mulai Cuti', 'value' => date('Y-m-d')],
            'pluginOptions' => ['autoClose' => true, 'format' => 'yyyy-mm-dd'],
        ]
    );
    echo $form->field($model, 'tgl_berakhir_cuti')->widget(
        DatePicker::className(),
        [
            'options'       => ['placeholder' => 'Pilih Tanggal Berakhir Cuti', 'value' => date('Y-m-d')],
            'pluginOptions' => ['autoClose' => true, 'format' => 'yyyy-mm-dd'],
        ]
    ) ?>

    <div class="form-group">
        <?php echo Html::submitButton(
            $model->isNewRecord ? 'Create' : 'Update',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
        ); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
