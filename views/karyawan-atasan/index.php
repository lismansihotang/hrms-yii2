<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KaryawanAtasanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Karyawan Atasan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karyawan-atasan-index">

    <h1><?php echo Html::encode($this->title); ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Karyawan Atasan', ['create'], ['class' => 'btn btn-success']); ?>
    </p>
    <?php echo GridView::widget(
        [
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'columns'      => [
                ['class' => 'yii\grid\SerialColumn'],
                #'id_atasan',
                ['label' => 'Nama Atasan', 'attribute' => 'id_karyawan_atasan', 'value' => 'atasan.nama'],
                ['label' => 'Karyawan', 'attribute' => 'id_karyawan', 'value' => 'karyawan.nama'],
                ['class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}'],
            ],
        ]
    ); ?>
</div>
