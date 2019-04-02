<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KaryawanInventarisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Karyawan Inventari';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-responsive karyawan-inventaris-index">

    <h1><?php echo Html::encode($this->title); ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Karyawan Inventaris', ['create'], ['class' => 'btn btn-success']); ?>
    </p>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_inventaris',
            'id_karyawan',
            'tgl_inventaris',
            'tgl_terima',
            'tgl_kembali',
            // 'id_barang_inventaris',
            // 'jml',
            // 'ket:ntext',

            ['class' => 'yii\grid\ActionColumn','template'=>'{view}'],
        ],
    ]); ?>
</div>
