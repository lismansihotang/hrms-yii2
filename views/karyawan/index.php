<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KaryawanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Karyawan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karyawan-index">

    <h1><?php echo Html::encode($this->title); ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?php
        echo Html::a('<span class="glyphicon btn-glyphicon glyphicon-edit img-circle text-muted"></span>Create Karyawan', ['create'], ['class' => 'btn btn-primary icon-btn margin-right-5']);
        echo Html::a('<span class="glyphicon btn-glyphicon glyphicon-list-alt img-circle text-muted"></span>Report Absensi Karyawan', ['report-absensi'], ['class' => 'btn icon-btn btn-default']);
        ?>
    </p>
    <?php
    echo GridView::widget(
            [
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'nik',
                    ['label' => 'Karyawan', 'attribute' => 'id_karyawan', 'value' => 'informasiPribadi.nama'],
                    ['attribute' => 'id_status', 'value' => 'status.nm_status', 'label' => 'Status'],
                    ['label' => 'Perusahaan', 'attribute' => 'id_perusahaan', 'value' => 'perusahaan.nm_pt'],
                    ['label' => 'Jabatan', 'attribute' => 'id_jabatan', 'value' => 'jabatan.nm_jabatan'],
                    // 'tgl_bergabung',
                    ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],
                ],
            ]
    );
    ?>
</div>
