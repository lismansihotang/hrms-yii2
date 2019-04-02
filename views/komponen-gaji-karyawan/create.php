<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KomponenGajiKaryawan */
$this->title = 'Create Komponen Gaji Karyawan';
if ($id_karyawan !== null) {
    $this->params['breadcrumbs'][] = [
        'label' => 'Komponen Gaji Karyawan',
        'url'   => ['karyawan/view', 'id' => $id_karyawan]
    ];
} else {
    $this->params['breadcrumbs'][] = ['label' => 'Komponen Gaji Karyawan', 'url' => ['index']];
}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="komponen-gaji-karyawan-create">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php echo $this->render(
        '_form',
        [
            'model' => $model,
            'id_karyawan' => $id_karyawan
        ]
    ); ?>

</div>
