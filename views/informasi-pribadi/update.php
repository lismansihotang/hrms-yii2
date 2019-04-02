<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InformasiPribadi */
$this->title = 'Update Informasi Pribadi: ' . $model->id_info;
if ($id_karyawan !== null) {
    $this->params['breadcrumbs'][] = ['label' => 'Informasi Pribadi', 'url' => ['karyawan/view', 'id' => $id_karyawan]];
    $this->params['breadcrumbs'][] = ['label' => $model->id_info, 'url' => ['karyawan/view', 'id' => $id_karyawan]];
} else {
    $this->params['breadcrumbs'][] = ['label' => 'Informasi Pribadi', 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => $model->id_info, 'url' => ['view', 'id' => $model->id_info]];
}
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="informasi-pribadi-update">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render(
        '_form',
        [
            'model'       => $model,
            'id_karyawan' => $id_karyawan
        ]
    ); ?>

</div>
