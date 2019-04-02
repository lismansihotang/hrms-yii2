<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AbsensiSummarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Absensi Summary';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="absensi-summary-index">

    <h1><?php echo Html::encode($this->title); ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Absensi Summary', ['create'], ['class' => 'btn btn-success']); ?>
    </p>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_penggajian',
            'id_karyawan',
            'tgl',
            'bulan',
            // 'tahun',
            // 'hadir',
            // 'absen',
            // 'cuti',
            // 'sakit',
            // 'ijin',
            // 'lain',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
