<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KaryawanSanksiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Karyawan Sanksi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-responsive karyawan-sanksi-index">

    <h1><?php echo Html::encode($this->title); ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Karyawan Sanksi', ['create'], ['class' => 'btn btn-success']); ?>
    </p>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_sanksi',
            'id_karyawan',
            'id_jenis_sanksi',
            'tgl_sanksi',
            'tgl_berlaku',
            // 'tgl_berakhir',

            ['class' => 'yii\grid\ActionColumn','template'=>'{view}'],
        ],
    ]); ?>
</div>
