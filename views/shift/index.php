<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ShiftSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shift';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shift-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Shift', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            #'id_shift',
            ['attribute' => 'id_karyawan', 'value' => 'karyawan.nama', 'label' => 'Karyawan'],
            ['attribute' => 'id_tipe_shift', 'value' => 'tipeShift.nm_shift', 'label' => 'Tipe Shift'],
            'jam_mulai',
            'jam_berakhir',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
