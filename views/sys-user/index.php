<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SysUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Pengguna';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sys-user-index">

    <h1><?php echo Html::encode($this->title); ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?php echo Html::a('<span class="glyphicon btn-glyphicon glyphicon-edit img-circle text-muted"></span>Create Pengguna', ['create'], ['class' => 'btn icon-btn btn-primary']); ?>
    </p>
    <?php
    echo GridView::widget(
            [
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    #'id',
                    #'number_id',
                    'user_name',
                    #'user_pass',
                    #'auth_key',
                    // 'auth_token',
                    // 'pass_reset',
                    // 'pass_generated',
                    'tipe_user',
                    ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],
                ],
            ]
    );
    ?>
</div>
