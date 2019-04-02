<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CutiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cuti';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuti-index">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <p>
        <?php echo Html::a('Create Cuti', ['create'], ['class' => 'btn btn-success']); ?>
    </p>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            #'id_cuti',
            ['attribute' => 'id_karyawan', 'value' => 'karyawan.nama', 'label' => 'Karyawan'],
            ['attribute' => 'id_tipe_cuti', 'value' => 'tipeCuti.nm_tipe_cuti','label'=>'Tipe Cuti'],
            'tgl_mulai_cuti',
            'tgl_berakhir_cuti',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
