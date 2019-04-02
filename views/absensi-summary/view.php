<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AbsensiSummary */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Absensi Summary', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="absensi-summary-view">

    <h1><?php echo Html::encode($this->title); ?></h1>

        <div class="btn-group margin-bottom-5">
        <?php echo Html::a('Home', ['index'], ['class' => 'btn btn-sm btn-success']);
        echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']);
        echo Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-sm btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]); ?>
        </div>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_penggajian',
            'id_karyawan',
            'tgl',
            'bulan',
            'tahun',
            'hadir',
            'absen',
            'cuti',
            'sakit',
            'ijin',
            'lain',
        ],
    ]); ?>

</div>
