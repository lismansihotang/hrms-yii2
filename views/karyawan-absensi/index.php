<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KaryawanAbsensiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Karyawan Absensi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-responsive karyawan-absensi-index">

    <h1><?php echo Html::encode($this->title); ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('<span class="glyphicon btn-glyphicon glyphicon-edit img-circle text-muted"></span>Create Karyawan Absensi', ['create'], ['class' => 'btn icon-btn btn-primary']); ?>
    </p>
    <?php
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id_karyawan_absensi',
            ['attribute' => 'id_karyawan', 'value' => 'karyawan.nama', 'label' => 'Karyawan'],
            'tgl_absensi',
            ['attribute' => 'id_tipe_absensi', 'value' => 'tipeAbsensi.nm_tipe_absensi', 'label' => 'Tipe Absensi'],
            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],
        ],
    ]);
    ?>
</div>
