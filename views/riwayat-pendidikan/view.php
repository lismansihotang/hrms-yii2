<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RiwayatPendidikan */
$this->title = $model->id_rp;
$this->params['breadcrumbs'][] = ['label' => 'Riwayat Pendidikan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="riwayat-pendidikan-view">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <div class="btn-group margin-bottom-5">
        <?php echo Html::a('Home', ['index'], ['class' => 'btn btn-sm btn-success']);
        echo Html::a('Update', ['update', 'id' => $model->id_rp], ['class' => 'btn btn-sm btn-primary']);
        echo Html::a(
            'Delete',
            ['delete', 'id' => $model->id_rp],
            [
                'class' => 'btn btn-sm btn-danger',
                'data'  => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method'  => 'post',
                ],
            ]
        ); ?>
    </div>

    <?php echo DetailView::widget(
        [
            'model'      => $model,
            'attributes' => [
                'id_rp',
                'informasiPribadi.nama',
                'pendidikan.nm_pendidikan',
                'tempatPendidikan.nm_tmpt',
                'thn_lulus',
            ],
        ]
    ); ?>

</div>
