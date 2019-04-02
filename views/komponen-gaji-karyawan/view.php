<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\KomponenGajiKaryawan */
$this->title = $model->id_kgk;
$this->params['breadcrumbs'][] = ['label' => 'Komponen Gaji Karyawan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="komponen-gaji-karyawan-view">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <div class="btn-group margin-bottom-5">
        <?php
        echo Html::a('Home', ['index'], ['class' => 'btn btn-sm btn-success']);
        echo Html::a('Update', ['update', 'id' => $model->id_kgk], ['class' => 'btn btn-sm btn-primary']);
        ?>
    </div>

    <?php echo DetailView::widget(
        [
            'model'      => $model,
            'attributes' => [
                'id_kgk',
                'karyawan.nama',
                'komponenGaji.nm_komponen',
                'nominal:integer',
            ],
        ]
    ); ?>

</div>
