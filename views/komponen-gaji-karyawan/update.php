<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KomponenGajiKaryawan */
$this->title = 'Update Komponen Gaji Karyawan: ' . $model->id_kgk;
if ($id_karyawan !== null) {
    $this->params['breadcrumbs'][] = [
        'label' => 'Komponen Gaji Karyawan',
        'url'   => ['karyawan/view', 'id' => $id_karyawan]
    ];
    $this->params['breadcrumbs'][] = ['label' => $model->id_kgk, 'url' => ['karyawan/view', 'id' => $id_karyawan]];
} else {
    $this->params['breadcrumbs'][] = ['label' => 'Komponen Gaji Karyawan', 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => $model->id_kgk, 'url' => ['view', 'id' => $model->id_kgk]];
}
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="komponen-gaji-karyawan-update">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render(
        '_form',
        [
            'model'       => $model,
            'id_karyawan' => $id_karyawan
        ]
    ); ?>

</div>
