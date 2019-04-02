<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KaryawanKeluargaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Karyawan Keluarga';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-responsive karyawan-keluarga-index">

    <h1><?php echo Html::encode($this->title); ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('<span class="glyphicon btn-glyphicon glyphicon-edit img-circle text-muted"></span>Create Karyawan Keluarga', ['create'], ['class' => 'btn icon-btn btn-primary']); ?>
    </p>
    <?php
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id_keluarga',
            'id_karyawan',
            'id_hub_keluarga',
            'nama',
            'tgl_lahir',
            // 'tmp_lahir',
            // 'jk',
            // 'alamat:ntext',
            // 'no_telp',
            // 'email:email',
            // 'id_pendidikan',
            // 'id_pekerjaan',
            // 'id_penghasilan',
            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],
        ],
    ]);
    ?>
</div>
