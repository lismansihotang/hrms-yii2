<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PenggajianKomponenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penggajian Komponen';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penggajian-komponen-index">

    <h1><?php echo Html::encode($this->title); ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Penggajian Komponen', ['create'], ['class' => 'btn btn-success']); ?>
    </p>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_penggajian',
            'id_komponen',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
