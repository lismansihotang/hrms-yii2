<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cuti */

$this->title = $model->id_cuti;
$this->params['breadcrumbs'][] = ['label' => 'Cuti', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuti-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

    <div class="btn-group">
        <?= Html::a('Home', ['index'], ['class' => 'btn btn-sm btn-success']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id_cuti], ['class' => 'btn btn-sm btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_cuti], [
            'class' => 'btn btn-sm btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_cuti',
            'karyawan.nama',
            'tipeCuti.nm_tipe_cuti',
            'tgl_mulai_cuti',
            'tgl_berakhir_cuti',
        ],
    ]); ?>

</div>
