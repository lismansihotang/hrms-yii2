<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InformasiPribadiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Informasi Pribadi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="informasi-pribadi-index">

    <h1><?php echo Html::encode($this->title); ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Informasi Pribadi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php echo GridView::widget(
        [
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'columns'      => [
                ['class' => 'yii\grid\SerialColumn'],
                #'id_info',
                #'id_karyawan',
                'nama',
                'tmp_lahir',
                'tgl_lahir',
                // 'alamat:ntext',
                'no_telp',
                'email:email',
                ['class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}'],
            ],
        ]
    ); ?>
</div>
