<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KaryawanAtasan */
$this->title = 'Update Karyawan Atasan: ' . $model->id_atasan;
if ($id_karyawan !== null) {
    $this->params['breadcrumbs'][] = ['label' => 'Karyawan Atasan', 'url' => ['karyawan/view', 'id' => $id_karyawan]];
    $this->params['breadcrumbs'][] = ['label' => $model->id_atasan, 'url' => ['karyawan/view', 'id' => $id_karyawan]];
} else {
    $this->params['breadcrumbs'][] = ['label' => 'Karyawan Atasan', 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => $model->id_atasan, 'url' => ['view', 'id' => $model->id_atasan]];
}
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="karyawan-atasan-update">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render(
        '_form',
        [
            'model'       => $model,
            'id_karyawan' => $id_karyawan
        ]
    ); ?>

</div>
