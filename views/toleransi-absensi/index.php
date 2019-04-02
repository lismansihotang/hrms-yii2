<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ToleransiAbsensiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Toleransi Absensi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-responsive toleransi-absensi-index">

    <h1><?php echo Html::encode($this->title); ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('<span class="glyphicon btn-glyphicon glyphicon-edit img-circle text-muted"></span>Create Toleransi Absensi', ['create'], ['class' => 'btn icon-btn btn-primary']); ?>
    </p>
    <?php
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            #'id_tolernasi',
            ['attribute' => 'id_tipe_absensi', 'value' => 'tipeAbsensi.nm_tipe_absensi', 'label' => 'Tipe Absensi'],
            'tahun',
            'jml',
            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],
        ],
    ]);
    ?>
</div>
