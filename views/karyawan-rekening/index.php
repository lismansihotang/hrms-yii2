<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KaryawanRekeningSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Karyawan Rekening';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-responsive karyawan-rekening-index">

    <h1><?php echo Html::encode($this->title); ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Karyawan Rekening', ['create'], ['class' => 'btn btn-success']); ?>
    </p>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_rekening',
            'id_karyawan',
            'id_bank',
            'no_rek',
            'nm_pemilik_rek',

            ['class' => 'yii\grid\ActionColumn','template'=>'{view}'],
        ],
    ]); ?>
</div>
