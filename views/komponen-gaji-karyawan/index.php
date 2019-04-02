<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KomponenGajiKaryawanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Komponen Gaji Karyawan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="komponen-gaji-karyawan-index">

    <h1><?php echo Html::encode($this->title); ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Komponen Gaji Karyawan', ['create'], ['class' => 'btn btn-success']); ?>
    </p>
    <?php echo GridView::widget(
        [
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'columns'      => [
                ['class' => 'yii\grid\SerialColumn'],
                ['label' => 'Karyawan', 'attribute' => 'id_karyawan', 'value' => 'karyawan.nama'],
                ['label' => 'Komponen', 'attribute' => 'id_komponen', 'value' => 'komponenGaji.nm_komponen'],
                'nominal:integer',
                ['class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}'],
            ],
        ]
    ); ?>
</div>
