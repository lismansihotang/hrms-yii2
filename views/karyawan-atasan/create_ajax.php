<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KaryawanAtasan */
$this->title = 'Create Karyawan Atasan';
?>
<div class="karyawan-atasan-create">
    <?php echo $this->render(
        '_form',
        [
            'model' => $model,
            'id_karyawan' => $id_karyawan
        ]
    ); ?>

</div>
