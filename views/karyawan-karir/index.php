<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KaryawanKarirSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Karyawan Karir';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-responsive karyawan-karir-index">

    <h1><?php echo Html::encode($this->title); ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Karyawan Karir', ['create'], ['class' => 'btn btn-success']); ?>
    </p>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_karir',
            'id_karyawan',
            'tgl',
            'jenis',
            'id_jabatan',
            // 'tgl_berlaku',

            ['class' => 'yii\grid\ActionColumn','template'=>'{view}'],
        ],
    ]); ?>
</div>
