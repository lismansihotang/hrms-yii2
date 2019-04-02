<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\KaryawanFingerId */
$this->title = $model->id_kfi;
$this->params['breadcrumbs'][] = ['label' => 'Karyawan Finger', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karyawan-finger-id-view">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <div class="btn-group margin-bottom-5">
        <?php echo Html::a('Home', ['index'], ['class' => 'btn btn-sm btn-success']);
        echo Html::a('Update', ['update', 'id' => $model->id_kfi], ['class' => 'btn btn-sm btn-primary']);
        ?>
    </div>

    <?php echo DetailView::widget(
        [
            'model'      => $model,
            'attributes' => [
                'id_kfi',
                'log_finger_id',
                'informasiPribadi.nama',
            ],
        ]
    ); ?>

</div>
