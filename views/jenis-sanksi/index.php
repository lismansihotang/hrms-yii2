<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JenisSanksiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jenis Sanksi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-responsive jenis-sanksi-index">

    <h1><?php echo Html::encode($this->title); ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('<span class="glyphicon btn-glyphicon glyphicon-edit img-circle text-muted"></span>Create Jenis Sanksi', ['create'], ['class' => 'btn icon-btn btn-primary']); ?>
    </p>
    <?php
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            #'id_jenis_sanksi',
            'nm_jenis_sanksi',
            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],
        ],
    ]);
    ?>
</div>
