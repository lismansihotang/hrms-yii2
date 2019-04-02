<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InformasiPribadi */
$this->title = 'Create Informasi Pribadi';
if ($id_karyawan !== null) {
    $this->params['breadcrumbs'][] = ['label' => 'Informasi Pribadi', 'url' => ['karyawan/view', 'id' => $id_karyawan]];
} else {
    $this->params['breadcrumbs'][] = ['label' => 'Informasi Pribadi', 'url' => ['index']];
}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="informasi-pribadi-create">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render(
        '_form',
        [
            'model'       => $model,
            'id_karyawan' => $id_karyawan
        ]
    ); ?>

</div>
