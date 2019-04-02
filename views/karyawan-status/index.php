<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KaryawanStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Karyawan Status';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-responsive karyawan-status-index">

    <h1><?php echo Html::encode($this->title); ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Karyawan Status', ['create'], ['class' => 'btn btn-success']); ?>
    </p>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_status_karyawan',
            'id_status',
            'id_karyawan',
            'tgl_status',
            'tgl_berlaku',
            // 'tgl_berakhir',

            ['class' => 'yii\grid\ActionColumn','template'=>'{view}'],
        ],
    ]); ?>
</div>
