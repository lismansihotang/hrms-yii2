<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PenggajianKaryawanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penggajian Karyawans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penggajian-karyawan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Penggajian Karyawan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pk',
            'id_penggajian',
            'id_karyawan',
            'pendapatan',
            'potongan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
