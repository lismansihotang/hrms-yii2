<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\KaryawanKeluarga */

$this->title = $model->id_keluarga;
$this->params['breadcrumbs'][] = ['label' => 'Karyawan Keluarga', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-responsive karyawan-keluarga-view">

    <h1><?php echo Html::encode($this->title); ?></h1>

        <div class="btn-group margin-bottom-5">
        <?php echo Html::a('Home', ['index'], ['class' => 'btn btn-sm btn-success']);
        echo Html::a('Update', ['update', 'id' => $model->id_keluarga], ['class' => 'btn btn-sm btn-primary']);
        echo Html::a('Delete', ['delete', 'id' => $model->id_keluarga], [
            'class' => 'btn btn-sm btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]); ?>
        </div>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_keluarga',
            'id_karyawan',
            'id_hub_keluarga',
            'nama',
            'tgl_lahir',
            'tmp_lahir',
            'jk',
            'alamat:ntext',
            'no_telp',
            'email:email',
            'id_pendidikan',
            'id_pekerjaan',
            'id_penghasilan',
        ],
    ]); ?>

</div>
