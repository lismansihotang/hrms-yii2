<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InformasiPribadi */
$this->title = 'Update Informasi Pribadi: ' . $model->id_info;
?>
<div class="informasi-pribadi-update">
    <?php echo $this->render(
        '_form',
        [
            'model' => $model,
            'id_karyawan' => $id_karyawan
        ]
    ); ?>

</div>
