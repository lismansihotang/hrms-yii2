<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PenggajianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penggajian';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penggajian-index">

    <h1><?php echo Html::encode($this->title); ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('<span class="glyphicon btn-glyphicon glyphicon-edit img-circle text-muted"></span>Create Penggajian', ['create'], ['class' => 'btn icon-btn btn-primary']); ?>
    </p>
    <?php
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            #'id',
            'tgl',
            'bulan',
            'tahun',
            ['attribute' => 'id_perusahaan', 'value' => 'perusahaan.nm_pt', 'label' => 'Perusahaan'],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
