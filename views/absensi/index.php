<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AbsensiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Absensi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="absensi-index">

    <h1><?php echo Html::encode($this->title); ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?php echo Html::a('<span class="glyphicon btn-glyphicon glyphicon-edit img-circle text-muted"></span>Create Absensi', ['create'], ['class' => 'btn icon-btn btn-primary']); ?>
    </p>
    <?php
    echo GridView::widget(
            [
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    ['label' => 'Karyawan', 'attribute' => 'id_karyawan', 'value' => 'informasiPribadi.nama'],
                    ['label' => 'Shift', 'attribute' => 'id_shift', 'value' => 'shift.nm_shift'],
                    'tgl_absensi',
                    'jam_mulai',
                    'jam_berakhir',
                    ['label' => 'Keterangan', 'attribute' => 'id_tipe_absensi', 'value' => 'tipeAbsensi.nm_tipe_absensi'],
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]
    );
    ?>
</div>
