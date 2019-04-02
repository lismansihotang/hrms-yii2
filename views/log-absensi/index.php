<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LogAbsensiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Absensi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-absensi-index">

    <h1><?php echo Html::encode($this->title); ?></h1>
<?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
    <?php echo Html::a('<span class="glyphicon btn-glyphicon glyphicon-edit img-circle text-muted"></span>Create Absensi', ['create'], ['class' => 'btn icon-btn btn-primary']); ?>
    </p>
    <?php
    echo GridView::widget(
            [
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    #'id',
                    #'log_match_id',
                    #'log_finger_id',
                    ['attribute' => 'log_finger_id', 'value' => 'karyawan.nama', 'label' => 'Karyawan'],
                    'log_fulldate',
                    'log_type',
                    'log_date',
                    'log_time',
                    ['class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}'],
                ],
            ]
    );
    ?>
</div>
