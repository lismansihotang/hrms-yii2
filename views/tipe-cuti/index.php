<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TipeCutiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Tipe Cuti';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipe-cuti-index">

    <h1><?php echo Html::encode($this->title); ?></h1>
<?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
    <?php echo Html::a('<span class="glyphicon btn-glyphicon glyphicon-edit img-circle text-muted"></span>Create Tipe Cuti', ['create'], ['class' => 'btn icon-btn btn-primary']); ?>
    </p>
    <?php
    echo GridView::widget(
            [
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    #'id_tipe_cuti',
                    'nm_tipe_cuti',
                    'jatah_cuti',
                    ['class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}'],
                ],
            ]
    );
    ?>
</div>
