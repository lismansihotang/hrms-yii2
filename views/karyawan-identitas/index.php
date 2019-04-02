<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KaryawanIdentitasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Karyawan Identita';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-responsive karyawan-identitas-index">

    <h1><?php echo Html::encode($this->title); ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Karyawan Identitas', ['create'], ['class' => 'btn btn-success']); ?>
    </p>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_identitas',
            'id_karyawan',
            'no_identitas',
            'id_jenis_identitas',

            ['class' => 'yii\grid\ActionColumn','template'=>'{view}'],
        ],
    ]); ?>
</div>
