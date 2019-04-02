<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InformasiPribadi */
$this->title = 'Create Informasi Pribadi';
?>
<div class="informasi-pribadi-create">
    <?php echo $this->render(
        '_form',
        [
            'model' => $model,
            'id_karyawan' => $id_karyawan
        ]
    ); ?>

</div>
