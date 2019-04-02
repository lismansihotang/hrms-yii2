<h2>Proses Data</h2>
<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin(
    [
        'method'  => 'post',
        'action'  => 'index.php?r=penggajian-karyawan/proses-create-data&id=' . $idKaryawan . '&idGaji=' . $idGaji,
        'options' => ['class' => 'form-horizontal']
    ]
);
if (count($model) > 0) {
    foreach ($model as $row) {
        echo '<div class="form-group">';
        echo Html::label($row->nm_komponen, 'id_komponen', ['class' => 'col-sm-2']);
        echo '<div class="col-sm-1">';
        echo Html::textInput('jumlah[]', 1, ['class' => 'form-control']);
        echo '</div>';
        echo '<div class="col-sm-4">';
        echo Html::hiddenInput('id_komponen[]', $row->id_komponen);
        echo Html::textInput('nominal[]', number_format($row->nominal, 0, ',', ''), ['class' => 'form-control']);
        echo '</div>';
        echo '</div>';
    }
}
echo '<div class="form-group">';
echo '<div class="col-sm-4">';
echo Html::submitButton('Save', ['class' => 'btn btn-sm btn-success']);
echo '</div>';
echo '</div>';
ActiveForm::end();