<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TipeShiftSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Tipe Shift';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipe-shift-index">

    <h1><?php echo Html::encode($this->title); ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?php echo Html::a('<span class="glyphicon btn-glyphicon glyphicon-edit img-circle text-muted"></span>Create Tipe Shift', ['create'], ['class' => 'btn icon-btn btn-primary']); ?>
    </p>
    <?php
    echo GridView::widget(
            [
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    #'id_tipe_shift',
                    'nm_shift',
                    ['class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}'],
                ],
            ]
    );
    ?>
</div>
