<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KaryawanFingerIdSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Karyawan Finger';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karyawan-finger-id-index">

    <h1><?php echo Html::encode($this->title); ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Karyawan Finger', ['create'], ['class' => 'btn btn-success']); ?>
    </p>
    <?php echo GridView::widget(
        [
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'columns'      => [
                ['class' => 'yii\grid\SerialColumn'],
                #'id_kfi',
                'log_finger_id',
                ['label' => 'Karyawan', 'attribute' => 'id_karyawan', 'value' => 'informasiPribadi.nama'],
                ['class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}'],
            ],
        ]
    ); ?>
</div>
