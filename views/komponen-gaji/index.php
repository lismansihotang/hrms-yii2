<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KomponenGajiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Komponen Gaji';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="komponen-gaji-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?php echo Html::a('<span class="glyphicon btn-glyphicon glyphicon-edit img-circle text-muted"></span>Create Komponen Gaji', ['create'], ['class' => 'btn icon-btn btn-primary']); ?>
    </p>
    <?php
    echo GridView::widget(
            [
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'nm_komponen',
                    'kategori_komponen',
                    'tipe',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]
    );
    ?>
</div>
