<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RiwayatPendidikanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Riwayat Pendidikan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="riwayat-pendidikan-index">

    <h1><?php echo Html::encode($this->title); ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Riwayat Pendidikan', ['create'], ['class' => 'btn btn-success']); ?>
    </p>
    <?php echo GridView::widget(
        [
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'columns'      => [
                ['class' => 'yii\grid\SerialColumn'],
                #'id_rp',
                ['label' => 'Karyawan', 'attribute' => 'id_karyawan', 'value' => 'informasiPribadi.nama'],
                ['label' => 'Pendidikan', 'attribute' => 'id_pendidikan', 'value' => 'pendidikan.nm_pendidikan'],
                ['label'     => 'Tempat Pendidikan',
                 'attribute' => 'id_tmpt_pendidikan',
                 'value'     => 'tempatPendidikan.nm_tmpt'
                ],
                'thn_lulus',
                ['class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}'],
            ],
        ]
    ); ?>
</div>
