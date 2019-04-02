<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KaryawanAtasan */
$this->title = 'Create Karyawan Atasan';
if ($id_karyawan !== null) {
    $this->params['breadcrumbs'][] = ['label' => 'Karyawan Atasan', 'url' => ['karyawan/view', 'id' => $id_karyawan]];
} else {
    $this->params['breadcrumbs'][] = ['label' => 'Karyawan Atasan', 'url' => ['index']];
}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karyawan-atasan-create">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render(
        '_form',
        [
            'model'       => $model,
            'id_karyawan' => $id_karyawan
        ]
    ); ?>

</div>
