<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KaryawanAtasan */
$this->title = 'Update Karyawan Atasan: ' . $model->id_atasan;
?>
<div class="karyawan-atasan-update">

    <?php echo $this->render(
        '_form',
        [
            'model' => $model,
            'id_karyawan' => $id_karyawan
        ]
    ); ?>

</div>
