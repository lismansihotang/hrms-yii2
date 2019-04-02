<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TempatPendidikanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Tempat Pendidikan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tempat-pendidikan-index">

    <h1><?php echo Html::encode($this->title); ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?php echo Html::a('<span class="glyphicon btn-glyphicon glyphicon-edit img-circle text-muted"></span>Create Tempat Pendidikan', ['create'], ['class' => 'btn icon-btn btn-primary']); ?>
    </p>
    <?php
    echo GridView::widget(
            [
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    #'id_tp',
                    'nm_tmpt',
                    'alamat:ntext',
                    'no_telp',
                    'no_fax',
                    // 'email:email',
                    ['class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}'],
                ],
            ]
    );
    ?>
</div>
