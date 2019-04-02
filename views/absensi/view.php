<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Absensi */
$this->title = $model->id_absensi;
$this->params['breadcrumbs'][] = ['label' => 'Absensi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="absensi-view">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <div class="btn-group margin-bottom-5">
        <?php
        echo Html::a('Home', ['index'], ['class' => 'btn btn-sm btn-success']);
        echo Html::a('Update', ['update', 'id' => $model->id_absensi], ['class' => 'btn btn-sm btn-primary']);
        echo Html::a(
            'Delete',
            ['delete', 'id' => $model->id_absensi],
            [
                'class' => 'btn btn-sm btn-danger',
                'data'  => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method'  => 'post',
                ],
            ]
        ); ?>
    </div>

    <?php echo DetailView::widget(
        [
            'model'      => $model,
            'attributes' => [
                'id_absensi',
                'id_karyawan',
                'id_shift',
                'tgl_absensi',
                'jam_mulai',
                'jam_berakhir',
                'id_tipe_absensi',
            ],
        ]
    ); ?>

</div>
