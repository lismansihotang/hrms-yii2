<?php
use app\models\KomponenGaji;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

$this->title = '#' . $id . ' Penggajian : Proses Komponen';
$this->params['breadcrumbs'][] = $this->title;
?>
    <h1><?php echo Html::encode($this->title); ?></h1>
    <div class="proses-penggajian-komponen">
        <?php
        echo Html::a('Home Penggajian', ['penggajian/view', 'id' => $id], ['class' => 'btn btn-sm btn-success']);
        $form = ActiveForm::begin(
            [
                'method'  => 'post',
                'action'  => 'index.php?r=penggajian-komponen/proses-create-data&id=' . $id,
                'options' => ['class' => 'form-horizontal']
            ]
        );
        $arrKomponen = ArrayHelper::map(KomponenGaji::find()->all(), 'id_komponen', 'nm_komponen');
        if (count($arrKomponen) > 0) {
            echo '<div class="form-group">';
            echo '<label class="checkbox-inline col-md-4">';
            echo Html::checkbox('chk_all', false, ['value' => '', 'id' => 'chk_all']);
            echo 'Check Semua';
            echo '</label>';
            echo '</div>';
            echo '<hr/>';
            foreach ($arrKomponen as $key => $val) {
                echo '<div class="form-group">';
                echo '<label class="checkbox-inline col-md-4">';
                echo Html::checkbox('chk_komponen[]', false, ['value' => $key, 'class' => 'chk_detail']);
                echo $val;
                echo '</label>';
                echo '</div>';
            }
        }
        echo '<div class="form-group">';
        echo '<div class="col-sm-4">';
        echo Html::submitButton('Save Proses Komponen Gaji', ['class' => 'btn btn-sm btn-success']);
        echo '</div>';
        echo '</div>';
        ActiveForm::end();
        ?>
    </div>
<?php
$js = <<<JS
    $('#chk_all').on('click',function(){
        var checked = true;
        if($(this).is(':checked')===false){
            checked=false;
        }
        $('.chk_detail').prop('checked',checked);
    });
JS;
$this->registerJs($js);